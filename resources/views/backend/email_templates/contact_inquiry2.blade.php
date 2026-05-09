<!DOCTYPE html>
<html>

<head>
    <title>New Contact Inquiry</title>
</head>

<body>
    <br />
    <table style="border: 0px solid lightgray;text-align:left;">
        <thead>
            <tr>
                <th style="padding: 10px 3px;text-transform:uppercase" colspan="2">
                    Quotation Inquiry
                </th>
            </tr>
        </thead>
        <tbody>
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
                <td style="padding: 3px">Size</td>
                <td style="padding: 3px">: {{ $details['type'] }}</td>
            </tr>
            <tr>
                <td style="padding: 3px">area</td>
                <td style="padding: 3px">: {{ $details['qty'] }}</td>
            </tr>
            <tr>
                <td style="padding: 3px">Grade</td>
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
