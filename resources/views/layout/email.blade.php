<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta http-equiv="Content-Type" content="text/html;" charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>@lang('emails.titre')</title>
    <!-- Web Font / @font-face : BEGIN -->
    <!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
    <!--[if mso]>
        <style>
            * {
                font-family: Arial, sans-serif !important;
            }
        </style>
    <![endif]-->
    <!-- Web Font / @font-face : END -->
    <!-- CSS Reset -->
    <style>
        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }
        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }
        /* What it does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin:0 !important;
        }
        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }
        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode:bicubic;
        }
        /* What it does: A work-around for email clients meddling in triggered links. */
        *[x-apple-data-detectors],  /* iOS */
        .x-gmail-data-detectors,    /* Gmail */
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
        /* What it does: Prevents Gmail from displaying an download button on large, non-linked images. */
        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }
        /* If the above doesn't work, add a .g-img class to any image in question. */
        img.g-img + div {
            display:none !important;
           }
        /* What it does: Prevents underlining the button text in Windows 10 */
        .button-link {
            text-decoration: none !important;
        }

        a.mcnButton{
			display:block;
		}

        /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
        /* Create one of these media queries for each additional viewport size you'd like to fix */
        /* Thanks to Eric Lepetit @ericlepetitsf) for help troubleshooting */
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { /* iPhone 6 and 6+ */
            .email-container {
                min-width: 375px !important;
            }
        }
    </style>
    <!-- Progressive Enhancements -->
    <style>
        /* Media Queries */
        @media screen and (max-width: 480px) {
            /* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
            .fluid {
                width: 100% !important;
                max-width: 100% !important;
                height: auto !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            /* What it does: Forces table cells into full-width rows. */
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }
            /* And center justify these ones. */
            .stack-column-center {
                text-align: center !important;
            }
            /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
            .center-on-narrow {
                text-align: center !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }
            table.center-on-narrow {
                display: inline-block !important;
            }

            /* What it does: Adjust typography on small screens to improve readability */
            .email-container p {
                font-size: 15px !important;
                line-height: 20px !important;
            }
            
            td.message{
                padding-left:20px !important; 
                padding-right:20px !important;
            }
            td.message_footer {
                padding:0!important;
            }
            td.message_footer img {
                text-align:center;
                margin:15px auto;
            }
            td.message_footer p {
                text-align:center;
                font-size:12px!important;
                line-height:19px!important;
                text-align:center!important;
                margin:0 auto!important;
                padding-left:15px!important; 
                padding-right:15px!important;
                margin-top:7px!important;
            }
        }
    </style>
    <!-- What it does: Makes background images in 72ppi Outlook render at correct size. -->
    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
</head>
<body width="100%" bgcolor="#FFFFFF" style="margin: 0; mso-line-height-rule: exactly;">
    <center style="width: 100%; background: #FFFFFF; text-align: left;">

        <!-- Visually Hidden Preheader Text : BEGIN -->
        <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;">
        </div>
        <!-- Visually Hidden Preheader Text : END -->

        <div style="max-width: 650px; margin: auto;" class="email-container">
            <!--[if mso]>
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="650" align="center">
            <tr>
            <td>
            <![endif]-->

            <!-- Email Body : BEGIN -->
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 650px;" class="email-container">

               <!-- HEADER : BEGIN -->
               <tbody>
               {{--
               <tr>
                    <td bgcolor="#ffffff">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tbody><tr>
                                <td style="padding: 10px 40px 10px 40px; font-family: Arial, sans-serif; font-size: 12px; line-height: 18px; color: #000000; text-align: center; font-weight:normal;">
                                    <p style="margin: 0;"><multiline>@lang('emails.entete')</multiline></p>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                --}}
                <tr>
                    <td bgcolor="#ffffff">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tbody><tr>
                                        <td bgcolor="#ffffff" align="center" valign="top">
                                            <a href="{{ config('app.url') }}">
                                                <img src="http://privileges.projetnouveaucentre.ca/img/emails/fond-en.jpg" width="650" alt="@lang('emails.titre')" style="display: block; border: 0px; width: 100%; height: auto; max-width: 650px;" />
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    </td>
                </tr>
                <!-- HEADER : END -->

                <!-- BODY : BEGIN -->
                @yield('body')
                <!-- BODY : END -->

                <!-- TOOLS : BEGIN -->
                <tr>
                    <td bgcolor="#d8d4d0">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tbody><tr>
                                <td class="message" style="text-align: center;padding: 5px 40px 5px 40px;">
                                    <center>
                                        <table class="center-on-narrow" align="center" cellspacing="0" cellpadding="0" border="0">
                                            <tbody><tr>
                                                <td valign="middle" width="22">
                                                    <a href="mailto:info@projetnouveaucentre.ca" style="display: block; border: 0px;text-decoration:none;"><img src="http://privileges.projetnouveaucentre.ca/img/emails/courrier.png" width="21" height="16" alt="@lang('emails.titre')" style="display: block;width:21px;padding:0; border: 0px; vertical-align: middle;height:16px;" /></a>
                                                </td>
                                                <td valign="middle" style="margin:0;padding-left:10px; font-family: Arial, sans-serif; font-size: 15px;color: #000000; text-align: center;">
                                                    <a href="mailto:info@projetnouveaucentre.ca" style="color: #000000;text-decoration:none;">info@projetnouveaucentre.ca</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </center>
                                </td>
                            </tr>{{--
                            <tr>
                                <td class="message" style="text-align: center;padding: 5px 70px 30px 70px;">
                                    <center>
                                        <table class="center-on-narrow" align="center" cellspacing="0" cellpadding="0" border="0">
                                            <tbody><tr>
                                                <td valign="middle" width="22">
                                                    <a href="mailto:info@projetnouveaucentre.ca" style="display: block; border: 0px;text-decoration:none;"><img src="http://privileges.projetnouveaucentre.ca/img/emails/telephone.png" width="21" height="21" alt="@lang('emails.titre')" style="display: block;width:21px;height:21px;padding:0; border: 0px; vertical-align: middle;" /></a>
                                                </td>
                                                <td valign="middle" style="margin:0;padding-left:10px; font-family: Arial, sans-serif; font-size: 15px;color: #000000; text-align: center;">514-987-6543</td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </center>
                                </td>
                            </tr>--}}
                        </tbody></table>
                    </td>
                </tr>
                <!-- TOOLS : END -->

                <!-- FOOTER : BEGIN -->
                <tr>
                    <td bgcolor="#1d1d1d" style="margin:0;padding:0;padding-bottom:20px;">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" bgcolor="#1d1d1d">
                            <tbody><tr>
                                <td class="stack-column-center message_footer" width="200" style="padding: 13px 0px 0px 0px;" valign="top">
                                    <p style="margin: 0 0px 0px 20px;"><a href="{{ config('app.url') }}" target="_blank" style="border: 0px;text-decoration:none;"><img src="http://privileges.projetnouveaucentre.ca/img/emails/logo-bk.jpg" width="122" height="49" alt="@lang('emails.titre')" style="display: block;padding:0; border: 0px;" /></a>
                                    </p>
                                </td>
                                <td class="stack-column-center message_footer" width="450" style="padding: 18px 0px 0px 0px; font-family: Arial, sans-serif; font-size: 10px; line-height: 14px; color: #ffffff;font-weight:normal;">
                                    <p style="margin: 10px 20px 0px 35px;text-align:right;">@lang('emails.footer.l1')<br>
                                    @lang('emails.footer.l2')<br>
                                    @lang('emails.footer.l3')<br>
                                    @lang('emails.footer.l4')</p></td>
                            </tr></tbody></table>
                    </td>
                </tr>
                <!-- FOOTER : END -->
            </tbody></table>
            <!-- Email Body : END -->

            <!--[if mso]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </div>

    </center>
    <style type="text/css"> 
        @media screen yahoo and (max-width: 480px) {
            .stack-column,
            .stack-column-center {
                display:block !important;
                width: 100% !important;
                max-width:100% !important;
                direction:ltr !important;
            }
            /* And center justify these ones. */
            .stack-column-center {
                text-align:center!important;
            }
            td.message {
                padding-left:20px!important; 
                padding-right:20px!important;
            }
            td.message_footer img {
                text-align:center;
                margin:15px auto;
            }
            td.message_footer p {
                text-align:center;
                font-size:12px!important;
                line-height:19px!important;
                text-align:center!important;
                margin:0 auto!important;
                padding-left:15px!important; 
                padding-right:15px!important;
                margin-top:7px!important;
            }

        }
</style>
</body></html>