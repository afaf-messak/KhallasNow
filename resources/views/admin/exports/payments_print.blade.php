<!doctype html>
<html>

<head>
        <meta charset="utf-8">
        <title>Payments (Print)</title>
        <style>
                body {
                        font-family: Arial, Helvetica, sans-serif
                }

                table {
                        width: 100%;
                        border-collapse: collapse;
                        font-size: 12px
                }

                th,
                td {
                        border: 1px solid #ccc;
                        padding: 6px;
                        text-align: left
                }

                th {
                        background: #f6f6f6
                }

                .actions {
                        margin: 12px 0
                }
        </style>
</head>

<body>
        <h2>Payments</h2>
        <div class="actions">
                <button onclick="window.print()">Print / Save as PDF</button>
        </div>
        <table>
                <thead>
                        <tr>
                                <th>ID</th>
                                <th>Display ID</th>
                                <th>User</th>
                                <th>Email</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Method</th>
                                <th>Status</th>
                                <th>Note</th>
                        </tr>
                </thead>
                <tbody>
                        @foreach($payments as $p)
                                <tr>
                                        <td>{{ $p->id }}</td>
                                        <td>{{ sprintf('#FP-%s', str_pad($p->id, 7, '0', STR_PAD_LEFT)) }}</td>
                                        <td>{{ $p->bill && $p->bill->contract ? ($p->bill->contract->title ?? 'Client') : 'Guest User' }}
                                        </td>
                                        <td>no-reply@example.com</td>
                                        <td>{{ number_format($p->amount, 2) }}</td>
                                        <td>{{ $p->paid_at ?? $p->created_at }}</td>
                                        <td>{{ $p->method ?? 'Card' }}</td>
                                        <td>{{ $p->amount > 0 ? 'Success' : 'Pending' }}</td>
                                        <td>{{ $p->note }}</td>
                                </tr>
                        @endforeach
                </tbody>
        </table>
</body>

</html>