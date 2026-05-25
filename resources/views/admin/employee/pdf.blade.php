<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title>Employee Profile</title>

    <style>

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        h2 {
            color: #ea2498;
            margin-bottom: 20px;
        }

        h3 {
            color: #ea2498;
            margin-top: 25px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th {
            background: #ea2498;
            color: white;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 10px;
        }

        .info-table td:first-child {
            width: 220px;
            font-weight: bold;
            background: #f9f9f9;
        }

        .section {
            margin-bottom: 30px;
        }

        .photo {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 1px solid #ddd;
        }

        .signature {
            font-family: cursive;
            font-size: 28px;
        }

    </style>

</head>

<body>

    <h2>Employee Profile</h2>

    {{-- Personal Information --}}
    <div class="section">

        <h3>Personal Information</h3>

        <table class="info-table">

            <tr>
                <td>Employee Name</td>
                <td>{{ $employee->name }}</td>
            </tr>

            <tr>
                <td>Employee Code</td>
                <td>{{ $employee->employee_code }}</td>
            </tr>

            <tr>
                <td>Designation</td>
                <td>{{ $employee->designation }}</td>
            </tr>

            <tr>
                <td>Department</td>
                <td>{{ $employee->department }}</td>
            </tr>

            <tr>
                <td>Date of Joining</td>
                <td>{{ $employee->doj }}</td>
            </tr>

            <tr>
                <td>Date of Birth</td>
                <td>{{ $employee->dob }}</td>
            </tr>

            <tr>
                <td>Gender</td>
                <td>{{ $employee->gender }}</td>
            </tr>

            <tr>
                <td>Contact</td>
                <td>{{ $employee->contact }}</td>
            </tr>

            <tr>
                <td>Emergency Contact</td>
                <td>{{ $employee->emergency_contact }}</td>
            </tr>

            <tr>
                <td>Marital Status</td>
                <td>{{ $employee->marital_status }}</td>
            </tr>

            <tr>
                <td>Father</td>
                <td>{{ $employee->father }}</td>
            </tr>

            <tr>
                <td>Mother</td>
                <td>{{ $employee->mother }}</td>
            </tr>

            <tr>
                <td>Spouse</td>
                <td>{{ $employee->spouse ?? '-' }}</td>
            </tr>

            <tr>
                <td>Blood Group</td>
                <td>{{ $employee->blood_group }}</td>
            </tr>

            <tr>
                <td>Aadhaar</td>
                <td>{{ $employee->aadhaar }}</td>
            </tr>

            <tr>
                <td>PAN</td>
                <td>{{ $employee->pan }}</td>
            </tr>

        </table>

    </div>

    {{-- Address --}}
    <div class="section">

        <h3>Address Details</h3>

        <table class="info-table">

            <tr>
                <td>Present Address</td>
                <td>{{ $employee->present_address }}</td>
            </tr>

            <tr>
                <td>Permanent Address</td>
                <td>{{ $employee->permanent_address }}</td>
            </tr>

            <tr>
                <td>Nominee</td>
                <td>{{ $employee->nominee }}</td>
            </tr>

        </table>

    </div>

    {{-- Bank --}}
    <div class="section">

        <h3>Bank Details</h3>

        <table class="info-table">

            <tr>
                <td>Bank Account</td>
                <td>{{ $employee->bank_account }}</td>
            </tr>

            <tr>
                <td>Bank Name</td>
                <td>{{ $employee->bank_name }}</td>
            </tr>

            <tr>
                <td>Branch</td>
                <td>{{ $employee->branch }}</td>
            </tr>

            <tr>
                <td>IFSC</td>
                <td>{{ $employee->ifsc }}</td>
            </tr>

            <tr>
                <td>Bank Address</td>
                <td>{{ $employee->bank_address }}</td>
            </tr>

        </table>

    </div>

    {{-- Photo --}}
    <div class="section">

        <h3>Employee Photo</h3>

        @if($employee->photo)

            <img src="{{ public_path('uploads/employees/'.$employee->photo) }}"
                 class="photo">

        @endif

    </div>

    {{-- Signature --}}
    <div class="section">

        <h3>Employee Signature</h3>

        <div class="signature">

            {{ $employee->signature }}

        </div>

    </div>

    {{-- Family --}}
    <div class="section">

        <h3>Family Details</h3>

        <table>

            <thead>

                <tr>

                    <th>Name</th>
                    <th>Relationship</th>
                    <th>DOB</th>
                    <th>Residing With</th>

                </tr>

            </thead>

            <tbody>

                @forelse($employee->familyDetails as $family)

                    <tr>

                        <td>{{ $family->name }}</td>

                        <td>{{ $family->relationship }}</td>

                        <td>{{ $family->dob }}</td>

                        <td>{{ $family->residing_with ?? '-' }}</td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" align="center">

                            No Family Details Found

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</body>

</html>
