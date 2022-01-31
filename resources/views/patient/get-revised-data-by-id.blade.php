<style>
    .show-revised-data th{ text-align: right; padding-right: 10px}
</style>

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
    @if(in_array(44,$permissions_allowed) || Auth::user()->role=='administrator')
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
            {{ $revised[0]->patient_phone}}
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
            {{ $revised[0]->occupation}}
        </td>
    </tr>

    <tr>
        <th width="50%">
            Block/House No
        </th>

        <td width="50%">
            {{ $revised[0]->house_no}}
        </td>
    </tr>

    <tr>
        <th width="50%">
            Apartment No
        </th>

        <td width="50%">
            {{ $revised[0]->apartments_no}}
        </td>
    </tr>

    <tr>
        <th width="50%">
            Street No
        </th>

        <td width="50%">
            {{ $revised[0]->street_no}}
        </td>
    </tr>

    <tr>
        <th width="50%">
            Street No
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
            Zip Code
        </th>

        <td width="50%">
            {{ $revised[0]->zip_code}}
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
@endif
    <tr>
        <th width="50%">
            Medication
        </th>

        <td width="50%">
            {{ $revised[0]->archive_medicine}}
        </td>
    </tr>

    <tr>
        <th width="50%">
            Illness
        </th>

        <td width="50%">
            {{ ($revised[0]->archive_illness)}}
        </td>
    </tr>




    </tbody>

</table>

<hr />
