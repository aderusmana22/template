<!DOCTYPE html>
<html>
<head>
    <title>CITA: New Idea Approval Request</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #b8860b; /* Emas */
            text-align: center;
        }
        p {
            line-height: 1.6;
        }
        strong {
            color: #b22222; /* Merah */
        }
        a {
            color: #b22222; /* Merah */
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            color: #b8860b; /* Emas */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #b8860b;
            color: #fff;
        }
        td {
            background-color: #fff;
        }
        td:nth-child(even) {
            background-color: #f9f9f9;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            color: #b8860b; /* Emas */
        }
        .icon {
            fill: #b22222;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CITA Notification</h1>
        <p>Dear <strong>{{ $approverName }}</strong>,</p>

        <p>You have a new idea to approve:</p>

        <table>
            <tr>
                <th>Title</th>
                <td>{{ $idea->title }}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{  $idea->category->name}}</td>
            </tr>
            @if($idea->category_id == 1)
            <tr>
                <th>Before</th>
                <td>{{ $idea->before }}</td>
            </tr>
            <tr>
                <th>After</th>
                <td>{{ $idea->after }}</td>
            </tr>
            <tr>
                <th>Benefit (Time/Rupiah)</th>
                <td>{{ $idea->benefit }}</td>
            </tr>
            @elseif($idea->category_id == 2)
            <tr>
                <th>Before</th>
                <td>{{ $idea->before }}</td>
            </tr>
            <tr>
                <th>After</th>
                <td>{{ $idea->after }}</td>
            </tr>
            <tr>
                <th>Sumber Best Practice</th>
                <td>{{ $idea->sumber_best_practice }}</td>
            </tr>
            @elseif($idea->category_id == 3)
            <tr>
                <th>Proses yang diimprove</th>
                <td>{{ $idea->proses_improve }}</td>
            </tr>
            <tr>
                <th>Before</th>
                <td>{{ $idea->before }}</td>
            </tr>
            <tr>
                <th>After</th>
                <td>{{ $idea->after }}</td>
            </tr>
            @elseif($idea->category_id == 4)
            <tr>
                <th>Before</th>
                <td>{{ $idea->before }}</td>
            </tr>
            <tr>
                <th>After</th>
                <td>{{ $idea->after }}</td>
            </tr>
            <tr>
                <th>Nama AI</th>
                <td>{{ $idea->nama_ai }}</td>
            </tr>
            @endif
            @if($idea->description)
            <tr>
                <th>Description</th>
                <td>{!! $idea->description !!}</td>
            </tr>
            @endif
        </table>

        <p>Untuk melakukan approval, silakan kunjungi <strong>CITA</strong> <p style="text-align: center;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#b8860b" viewBox="0 0 24 24" style="vertical-align: middle;">
                <path d="M14.71 6.29a1 1 0 0 0-1.42 1.42L16.59 11H4a1 1 0 0 0 0 2h12.59l-3.3 3.29a1 1 0 1 0 1.42 1.42l5-5a1 1 0 0 0 0-1.42z"></path>
            </svg>
            <a href="https://cita.sinarmeadow.com/idea-approvals" style="text-decoration: none; color: #b22222; font-weight: bold; font-size: 24px;">Klik link ini</a>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#b8860b" viewBox="0 0 24 24" style="vertical-align: middle; transform: rotate(180deg);">
                <path d="M14.71 6.29a1 1 0 0 0-1.42 1.42L16.59 11H4a1 1 0 0 0 0 2h12.59l-3.3 3.29a1 1 0 1 0 1.42 1.42l5-5a1 1 0 0 0 0-1.42z"></path>
            </svg>
        </p>
        </p>

        <div class="footer">
            <p>Thanks, and Regards,</p>
            <p>CITA Team</p>
            <p>Sinar Meadow International Indonesia</p>
        </div>
    </div>
</body>
</html>
