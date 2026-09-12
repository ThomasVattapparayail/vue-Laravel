<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <style>
        body {
            margin: 0;
            padding: 30px 15px;
            background-color: #f4f6f8;
            font-family: Arial, Helvetica, sans-serif;
            color: #333333;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
        }

        .email-header {
            background-color: #2563eb;
            padding: 25px;
            text-align: center;
            color: #ffffff;
        }

        .email-header h2 {
            margin: 0;
            font-size: 24px;
        }

        .email-body {
            padding: 30px;
        }

        .info-row {
            margin-bottom: 18px;
        }

        .label {
            display: block;
            font-size: 13px;
            font-weight: bold;
            color: #6b7280;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .value {
            font-size: 16px;
            color: #222222;
        }

        .message-box {
            margin-top: 25px;
            padding: 20px;
            background-color: #f8fafc;
            border-left: 4px solid #2563eb;
            border-radius: 5px;
        }

        .message-box p {
            margin: 8px 0 0;
            line-height: 1.6;
            white-space: pre-line;
        }

        .email-footer {
            padding: 18px 30px;
            background-color: #f8fafc;
            text-align: center;
            color: #888888;
            font-size: 12px;
        }
    </style>
</head>

<body>

<div class="email-container">

    <div class="email-header">
        <h2>New Contact Message</h2>
    </div>

    <div class="email-body">

        <div class="info-row">
            <span class="label">Name</span>
            <span class="value">
                {{ $contact->name }}
            </span>
        </div>

        <div class="info-row">
            <span class="label">Email</span>
            <span class="value">
                {{ $contact->email }}
            </span>
        </div>

        <div class="message-box">
            <span class="label">Message</span>

            <p>
                {{ $contact->message }}
            </p>
        </div>

    </div>

    <div class="email-footer">
        This message was sent through your website contact form.
    </div>

</div>

</body>
</html>

