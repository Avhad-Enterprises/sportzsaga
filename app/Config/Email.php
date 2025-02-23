<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    // Email settings
    public string $fromEmail  = 'sportsaaga@gmail.com'; // Replace with your email address
    public string $fromName   = 'Sportzsaga'; // Replace with your name
    public string $recipients = '';

    /**
     * The "user agent"
     */
    public string $userAgent = 'CodeIgniter';

    /**
     * The mail sending protocol: mail, sendmail, smtp
     */
    public string $protocol = 'smtp'; // Changed to 'smtp' for SMTP email sending

    /**
     * The server path to Sendmail.
     */
    public string $mailPath = '/usr/sbin/sendmail';

    /**
     * SMTP Server Hostname
     */
    public string $SMTPHost = 'smtp.gmail.com'; // Replace with your SMTP server address

    /**
     * SMTP Username
     */
    public string $SMTPUser = 'sportsaaga@gmail.com'; // Replace with your SMTP username

    /**
     * SMTP Password
     */
    public string $SMTPPass = 'zwpt zldu dqkk jxrs'; // Replace with your SMTP password

    /**
     * SMTP Port
     */
    public int $SMTPPort = 587; // Typically 587 for TLS or 465 for SSL

    /**
     * SMTP Timeout (in seconds)
     */
    public int $SMTPTimeout = 30; // Increased timeout

    /**
     * Enable persistent SMTP connections
     */
    public bool $SMTPKeepAlive = false;

    /**
     * SMTP Encryption.
     *
     * @var string '', 'tls' or 'ssl'. 'tls' will issue a STARTTLS command
     *             to the server. 'ssl' means implicit SSL. Connection on port
     *             465 should set this to 'ssl'.
     */
    public string $SMTPCrypto = 'tls'; // Use 'tls' for TLS or 'ssl' for SSL

    /**
     * Enable word-wrap
     */
    public bool $wordWrap = true;

    /**
     * Character count to wrap at
     */
    public int $wrapChars = 76;

    /**
     * Type of mail, either 'text' or 'html'
     */
    public string $mailType = 'html'; // Changed to 'html' for better formatting

    /**
     * Character set (utf-8, iso-8859-1, etc.)
     */
    public string $charset = 'UTF-8';

    /**
     * Whether to validate the email address
     */
    public bool $validate = true;

    /**
     * Email Priority. 1 = highest. 5 = lowest. 3 = normal
     */
    public int $priority = 3;

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $CRLF = "\r\n";

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $newline = "\r\n";

    /**
     * Enable BCC Batch Mode.
     */
    public bool $BCCBatchMode = false;

    /**
     * Number of emails in each BCC batch
     */
    public int $BCCBatchSize = 200;

    /**
     * Enable notify message from server
     */
    public bool $DSN = false;
}
