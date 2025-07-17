<!DOCTYPE html>
<html>

<body style="margin: 0; padding: 0; background-color: #f5f7fa; font-family: Arial, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f5f7fa; padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="500" cellpadding="0" cellspacing="0"
                    style="background-color: #ffffff; border-radius: 8px;">
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #2d3748; padding: 20px; text-align: center;">
                            <h2 style="color: #ffffff; margin: 0;">Security Verification</h2>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding: 30px; text-align: center;">
                            <p style="font-size: 16px; color: #333;">Use the following code to complete your login:</p>
                            <div style="font-size: 28px; font-weight: bold; color: #2d3748; margin: 20px 0;">
                                {{ $code }}
                            </div>
                            {{-- <p style="font-size: 14px; color: #999;">
                  This code will expire in 10 minutes. If you didn’t request it, please ignore this email.
                </p> --}}
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td
                            style="background-color: #f1f1f1; padding: 20px; text-align: center; font-size: 13px; color: #777;">
                            For support, contact <a href="mailto:support@your-website.com"
                                style="color: #2d3748;">support@your-website.com</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
