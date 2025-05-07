<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Calculate realized and unrealized profit and loss for a portfolio.
 * 
 * @param array $transactions List of transactions for a portfolio.
 * @param array $current_prices Associative array of coin_id => current_price.
 * @return array Associative array with keys 'realized' and 'unrealized' profit/loss.
 */
function calculate_profit_loss($transactions, $current_prices)
{
    // Initialize results
    $result = [
        'realized' => 0.0,
        'unrealized' => 0.0,
        'per_coin' => []
    ];

    // Track holdings per coin
    $holdings = [];

    // Track cost basis per coin for unrealized P&L
    $cost_basis = [];

    // Track realized P&L per coin
    $realized_pl = [];

    foreach ($transactions as $tx) {
        $coin_id = $tx['coin_id'];
        $type = $tx['type'];
        $qty = floatval($tx['quantity']);
        $price = floatval($tx['price']);

        if (!isset($holdings[$coin_id])) {
            $holdings[$coin_id] = 0.0;
            $cost_basis[$coin_id] = 0.0;
            $realized_pl[$coin_id] = 0.0;
        }

        if ($type === 'buy') {
            // Increase holdings and cost basis
            $total_cost = $cost_basis[$coin_id] * $holdings[$coin_id];
            $total_cost += $qty * $price;
            $holdings[$coin_id] += $qty;
            $cost_basis[$coin_id] = $holdings[$coin_id] > 0 ? $total_cost / $holdings[$coin_id] : 0.0;
        } elseif ($type === 'sell') {
            // Decrease holdings and calculate realized P&L
            if ($holdings[$coin_id] >= $qty) {
                $realized = $qty * ($price - $cost_basis[$coin_id]);
                $realized_pl[$coin_id] += $realized;
                $holdings[$coin_id] -= $qty;
                // Cost basis remains same for remaining holdings
            } else {
                // Selling more than holdings - handle as error or ignore
                // For now, ignore excess sell
                $qty = $holdings[$coin_id];
                $realized = $qty * ($price - $cost_basis[$coin_id]);
                $realized_pl[$coin_id] += $realized;
                $holdings[$coin_id] = 0.0;
                $cost_basis[$coin_id] = 0.0;
            }
        } elseif ($type === 'swap') {
            // For swap, treat as sell and buy simultaneously
            // This requires more complex handling, for now ignore or treat as sell
            // TODO: Implement swap logic properly
        }
    }

    // Calculate unrealized P&L
    foreach ($holdings as $coin_id => $qty) {
        if ($qty > 0 && isset($current_prices[$coin_id])) {
            $unrealized = $qty * ($current_prices[$coin_id] - $cost_basis[$coin_id]);
            $result['unrealized'] += $unrealized;
            $result['per_coin'][$coin_id] = [
                'holdings' => $qty,
                'cost_basis' => $cost_basis[$coin_id],
                'current_price' => $current_prices[$coin_id],
                'unrealized' => $unrealized,
                'realized' => $realized_pl[$coin_id]
            ];
        } else {
            $result['per_coin'][$coin_id] = [
                'holdings' => $qty,
                'cost_basis' => $cost_basis[$coin_id],
                'current_price' => null,
                'unrealized' => 0.0,
                'realized' => $realized_pl[$coin_id]
            ];
        }
    }

    // Sum realized P&L
    $result['realized'] = array_sum($realized_pl);

    return $result;
}
