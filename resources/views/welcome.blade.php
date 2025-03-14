<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Wallet Dashboard</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header h1 {
            font-size: 1.8rem;
            color: #333;
        }

        /* Wallet Card */
        .wallet-card {
            background-color: #4caf50;
            color: #fff;
            border-radius: 10px;
            text-align: center;
            padding: 20px;
            margin-bottom: 20px;
        }

        .wallet-card h2 {
            font-size: 1.4rem;
            margin-bottom: 10px;
        }

        .amount {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .btn-add-funds {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            color: #4caf50;
            background-color: #fff;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-add-funds:hover {
            background-color: #eee;
            color: #3e8e41;
            text-decoration: none;
        }

        /* Form Styles */
        .voucher-form {
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .voucher-form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 1rem;
        }

        .voucher-form button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            font-size: 1rem;
        }

        .voucher-form button:hover {
            background-color: #45a049;
        }

        /* Transactions */
        .transactions h3 {
            text-align: center;
            font-size: 1.4rem;
            margin-bottom: 20px;
        }

        .list-group {
            list-style-type: none;
            padding: 0;
        }

        .list-group-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 15px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .list-group-item:last-child {
            margin-bottom: 0;
        }

        .text-success {
            color: #4caf50;
        }

        .text-danger {
            color: #ff5252;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="text-center mb-4">
            <h1>E-Wallet Dashboard</h1>
        </header>

        <!-- Wallet Card -->
        <div class="wallet-card p-4 mb-4">
            <h2>Votre solde :</h2>
            <p class="amount">{{ number_format($balance, 2) }} FDJ</p>
            <a href="{{ route('reset') }}">Remettre à zero</a>
        </div>

        <!-- Voucher Form -->
        <div class="voucher-form">
            <h3>Recharger votre portefeuille</h3>

            @if (session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif

            <form action="{{ route('recharger') }}" method="POST">
                @csrf
                <label for="voucher-code">Entrez un code de recharge (12 chiffres) :</label>
                <input 
                    type="text" 
                    name="voucher" 
                    id="voucher-code" 
                    placeholder="Ex: 123456789012" 
                    maxlength="12" 
                    required 
                    pattern="[0-9]{12}">
                <button type="submit">Recharger</button>
            </form>
        </div>

        <!-- Transactions -->
        <section class="transactions">
            <h3>Transactions récentes</h3>
            <ul class="list-group">
                @foreach($transactions as $transaction)
                    <li class="list-group-item">
                        <span>{{ $transaction['description'] }}</span>
                        <span class="{{ $transaction['amount'] >= 0 ? 'text-success' : 'text-danger' }}">
                            {{ $transaction['amount'] >= 0 ? '+' : '-' }} {{ number_format(abs($transaction['amount']), 2) }} FDJ
                        </span>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
</body>
</html>
