<html>
    <head>
        <title>New Registration</title>
        <style>
            .approveBtn {
                margin-top: 5px;
                color: white;
                background: #588def;
                padding: 8px 20px;
                border-radius: 5px;
                text-decoration: none;
            }
            .approveBtn:hover {
                color: white;
                background: #3b7aed;
            }
        </style>
    </head>
    <body>
        <div style="height:300px">
            <div>
                <p>Hi, My email id is: {{ $data['from'] }}</p>
                <p>My Company name is: {{ $data['companyName'] }}</p>
                <p>I registered under the following Business Categories: {{ $data['categoryList'] }}</p>
                <p>Selected Registration Package: {{ $data['package'] }}</p>
                <p>and I have completed registration with Canadian Exports on {{ \Carbon\Carbon::now()->format("F d, Y, h:i A") }}</p>
            </div>
            <a class="approveBtn" href="{{ route("admin.user.approve", $data['token']) }}" target="canadian">Approve</a>
        </div>
    </body>
</html>