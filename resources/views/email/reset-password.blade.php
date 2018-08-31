@extends('layout.email')
@section('body')
<tr>
    <td bgcolor="#efece8">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tbody>
                <tr>
                    <td class="message" style="padding: 30px 40px 20px 40px; font-family: Arial, sans-serif; font-size: 15px; line-height: 22px; color: #000000; text-align: center;font-weight: bold;">
                        <p style="margin: 0;"><multiline>@lang('emails.bonjour'),</multiline></p>
                    </td>
                </tr>
                <tr>
                    <td class="message" style="padding: 0px 100px 15px 100px; font-family: Arial, sans-serif; font-size: 15px; line-height: 22px; color: #000000; text-align: center;font-weight: normal;">
                        <p style="margin: 0;"><multiline>@lang('emails.email-password-reset.p')</multiline></p>
                    </td>
                </tr>
                <tr>
                    <td valign="top" align="center" style="text-align: center; padding: 15px 0px 35px 0px;">
                        <!-- Button : BEGIN -->
                        <center>
                            <table class="mcnButtonBlock center-on-narrow" align="center" style="text-align: center;" cellspacing="0" cellpadding="0" border="0">
                                <tbody class="mcnButtonBlockOuter">
                                    <tr>
                                        <td class="mcnButtonBlockInner" valign="top" align="center">
                                            <table class="mcnButtonContentContainer" style="border-collapse: separate !important;border-radius: 0;background-color: #000000;" cellspacing="0" cellpadding="0" border="0">
                                                <tbody>
                                                    <tr>
                                                        <td class="mcnButtonContent" style="font-family: Arial; font-size: 14px;padding-top:13px; padding-right:28px; padding-bottom:13px; padding-left:28px;" valign="middle" align="center">
                                                            <a class="mcnButton " title="@lang('emails.email-password-reset.button')" href="{{ $link }}" target="_blank" style="font-weight: normal;letter-spacing: normal;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;">@lang('emails.email-password-reset.button')</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </center>
                        <!-- Button : END -->
                    </td>
                </tr>
                <tr>
            </tbody>
        </table>
    </td>
</tr>
@include('email.partials.questions')
@endsection