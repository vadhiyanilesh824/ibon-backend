<!DOCTYPE html>
<html>

<head>
    <title>{{config('app.name')}} : New Dealer Inquiry</title>
</head>

<body>
    <br />
    <table style="border: 0px solid lightgray;text-align:left;">
        <thead>
            <tr>
                <th style="padding: 10px 3px" colspan="2">
                    New Dealer Inquiry
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 3px">Company Name</td>
                <td style="padding: 3px">: {{ $details['company_name'] }}</td>
            </tr>
            <tr>
                <td style="padding: 3px">Name</td>
                <td style="padding: 3px">: {{ $details['name'] }}</td>
            </tr>
            <tr>
                <td style="padding: 3px">Email</td>
                <td style="padding: 3px">: {{ $details['email'] }}</td>
            </tr>
            <tr>
                <td style="padding: 3px">Phone</td>
                <td style="padding: 3px">: {{ $details['phone'] }}</td>
            </tr>
            <tr>
                <td style="padding: 3px">Subject</td>
                <td style="padding: 3px">: {{ $details['subject'] }}</td>
            </tr>
            <tr>
                <td style="padding: 3px">Message</td>
                <td style="padding: 3px">: {{ $details['message'] }}</td>
            </tr>
        </tbody>
    </table>

</body>

</html>
