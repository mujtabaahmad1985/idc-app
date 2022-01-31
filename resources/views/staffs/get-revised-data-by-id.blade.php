

<table>
    <tbody>
    <tr>
        <th width="50%">
            Salutation
        </th>

        <td width="50%">
            {{ $revised[0]->salutation}}
        </td>
    </tr>
    <tr>
        <th width="50%">
            First Name
        </th>

        <td width="50%">
            {{ $revised[0]->first_name}}
        </td>
    </tr>
    <tr>
        <th width="50%">
            Last Name
        </th>

        <td width="50%">
            {{ $revised[0]->last_name}}
        </td>
    </tr>

    <tr>
        <th width="50%">
            ID No
        </th>

        <td width="50%">
            {{ $revised[0]->id_no}}
        </td>
    </tr>

    <tr>
        <th width="50%">
            Date of birth
        </th>

        <td width="50%">
            {{ date('d.m.Y', strtotime($revised[0]->date_of_birth))}}
        </td>
    </tr>
    <tr>
        <th width="50%">
            Email
        </th>

        <td width="50%" style="text-transform: none">
            {{ $revised[0]->email}}
        </td>
    </tr>
    <tr>
        <th width="50%">
            Contact No.
        </th>

        <td width="50%">
            {{ $revised[0]->contact_number}}
        </td>
    </tr>

    <tr>
        <th width="50%">
            Gender
        </th>

        <td width="50%">
            {{ $revised[0]->gender}}
        </td>
    </tr>
    <tr>
        <th width="50%">
            Designation
        </th>

        <td width="50%">
            {{ $revised[0]->designation}}
        </td>
    </tr>
    <tr>
        <th width="50%">
            Zip Code
        </th>

        <td width="50%">
            {{ $revised[0]->zip_code}}
        </td>
    </tr>

    <tr>
        <th width="50%">
            State
        </th>

        <td width="50%">
            {{ $revised[0]->state}}
        </td>
    </tr>

    <tr>
        <th width="50%">
            City
        </th>

        <td width="50%">
            {{ $revised[0]->city}}
        </td>
    </tr>

    <tr>
        <th width="50%">
            Country
        </th>

        <td width="50%">
            {{ $revised[0]->country}}
        </td>
    </tr>

    <tr>
        <th width="50%">
            Address
        </th>

        <td width="50%">
            {{ $revised[0]->address}}
        </td>
    </tr>

    <tr>
        <th width="50%">
            Start Date
        </th>

        <td width="50%">
            {{ $revised[0]->start_date}}
        </td>
    </tr>

    <tr>
        <th width="50%">
            End Date
        </th>

        <td width="50%">
            {{ $revised[0]->end_date}}
        </td>
    </tr>




    </tbody>

</table>

<hr />
