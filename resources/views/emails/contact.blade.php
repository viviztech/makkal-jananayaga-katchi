<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #dc2626; color: white; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { background: #f8f9fa; padding: 20px; border-radius: 0 0 8px 8px; }
        .field { margin-bottom: 15px; }
        .field-label { font-weight: bold; color: #dc2626; }
        .field-value { background: white; padding: 10px; border-radius: 4px; border-left: 4px solid #dc2626; }
        .message-content { white-space: pre-wrap; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>VCK - New Contact Form Submission</h1>
            <p>You have received a new message from your website contact form.</p>
        </div>

        <div class="content">
            <div class="field">
                <div class="field-label">Name:</div>
                <div class="field-value">{{ $name }}</div>
            </div>

            <div class="field">
                <div class="field-label">Email:</div>
                <div class="field-value">{{ $email }}</div>
            </div>

            <div class="field">
                <div class="field-label">Subject:</div>
                <div class="field-value">{{ $subject }}</div>
            </div>

            <div class="field">
                <div class="field-label">Message:</div>
                <div class="field-value message-content">{{ $message }}</div>
            </div>

            <hr style="margin: 20px 0; border: none; border-top: 1px solid #dee2e6;">

            <p style="color: #6c757d; font-size: 14px;">
                This message was sent from the contact form on your VCK website.
            </p>
        </div>
    </div>
</body>
</html>