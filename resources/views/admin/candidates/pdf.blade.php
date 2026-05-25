<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Candidate PDF</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
            line-height: 1.6;
        }

        h2,
        h3 {
            color: #ea2498;
            margin-bottom: 10px;
        }

        .section {
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th {
            background: #ea2498;
            color: white;
            padding: 8px;
            text-align: left;
        }

        td {
            padding: 8px;
        }

        .info-table td:first-child {
            width: 220px;
            font-weight: bold;
            background: #f8f8f8;
        }

        .box {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <h2>Candidate Details</h2>

    {{-- Personal Information --}}
    <div class="section">

        <h3>Personal Information</h3>

        <table class="info-table">

            <tr>
                <td>Full Name</td>
                <td>{{ $candidate->full_name }}</td>
            </tr>

            <tr>
                <td>Email</td>
                <td>{{ $candidate->email }}</td>
            </tr>

            <tr>
                <td>Mobile</td>
                <td>{{ $candidate->mobile }}</td>
            </tr>

            <tr>
                <td>Phone</td>
                <td>{{ $candidate->phone ?? '-' }}</td>
            </tr>

            <tr>
                <td>Gender</td>
                <td>{{ ucfirst($candidate->gender) }}</td>
            </tr>

            <tr>
                <td>Marital Status</td>
                <td>{{ ucfirst($candidate->marital_status) }}</td>
            </tr>

            <tr>
                <td>Date of Birth</td>
                <td>{{ $candidate->dob }}</td>
            </tr>

            <tr>
                <td>Age</td>
                <td>{{ $candidate->age }}</td>
            </tr>

            <tr>
                <td>Position Applied</td>
                <td>{{ $candidate->position_applied }}</td>
            </tr>

            <tr>
                <td>Experience</td>
                <td>{{ $candidate->experience }} Years</td>
            </tr>

            <tr>
                <td>Current Gross</td>
                <td>₹{{ $candidate->current_gross }}</td>
            </tr>

            <tr>
                <td>Expected Gross</td>
                <td>₹{{ $candidate->expected_gross }}</td>
            </tr>

            <tr>
                <td>Notice Period</td>
                <td>{{ $candidate->notice_period }}</td>
            </tr>

            <tr>
                <td>Joining Date</td>
                <td>{{ $candidate->joining_date }}</td>
            </tr>

            <tr>
                <td>Address</td>
                <td>{{ $candidate->contact_address }}</td>
            </tr>

            <tr>
                <td>Pin Code</td>
                <td>{{ $candidate->pin_code }}</td>
            </tr>

            <tr>
                <td>Certifications</td>
                <td>{{ $candidate->certifications }}</td>
            </tr>

        </table>

    </div>

    {{-- Education --}}
    <div class="section">

        <h3>Education Details</h3>

        <table>

            <thead>
                <tr>
                    <th>Degree</th>
                    <th>College</th>
                    <th>University</th>
                    <th>Marks</th>
                    <th>Year</th>
                </tr>
            </thead>

            <tbody>

                @foreach($candidate->educations as $education)

                    <tr>
                        <td>{{ $education->degree }}</td>
                        <td>{{ $education->college }}</td>
                        <td>{{ $education->university }}</td>
                        <td>{{ $education->marks }}</td>
                        <td>{{ $education->year }}</td>
                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    {{-- Experience --}}
    <div class="section">

        <h3>Experience Details</h3>

        @foreach($candidate->experiences as $experience)

            <div class="box">

                <p><strong>Organization:</strong> {{ $experience->organization }}</p>

                <p><strong>Designation:</strong> {{ $experience->designation }}</p>

                <p><strong>From:</strong> {{ $experience->from_date }}</p>

                <p><strong>To:</strong> {{ $experience->to_date }}</p>

                <p><strong>Gross Salary:</strong> ₹{{ $experience->gross_salary }}</p>

                <p><strong>Annual CTC:</strong> ₹{{ $experience->annual_ctc }}</p>

                <p><strong>Reason For Leaving:</strong> {{ $experience->reason_for_leaving }}</p>

            </div>

        @endforeach

    </div>

    {{-- Languages --}}
    <div class="section">

        <h3>Languages Known</h3>

        <table>

            <thead>
                <tr>
                    <th>Language</th>
                    <th>Read</th>
                    <th>Write</th>
                    <th>Speak</th>
                    <th>Understand</th>
                </tr>
            </thead>

            <tbody>

                @foreach($candidate->languages as $language)

                    <tr>

                        <td>{{ $language->language }}</td>

                        <td>{{ $language->can_read ? 'Yes' : 'No' }}</td>

                        <td>{{ $language->can_write ? 'Yes' : 'No' }}</td>

                        <td>{{ $language->can_speak ? 'Yes' : 'No' }}</td>

                        <td>{{ $language->can_understand ? 'Yes' : 'No' }}</td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    {{-- Family --}}
    <div class="section">

        <h3>Family Details</h3>

        @foreach($candidate->families as $family)

            <div class="box">

                <p><strong>Name:</strong> {{ $family->name }}</p>

                <p><strong>Age:</strong> {{ $family->age }}</p>

                <p><strong>Relationship:</strong> {{ $family->relationship }}</p>

                <p><strong>Occupation:</strong> {{ $family->occupation }}</p>

                <p><strong>Dependent:</strong> {{ $family->dependent }}</p>

                <p><strong>Contact:</strong> {{ $family->contact }}</p>

            </div>

        @endforeach

    </div>

    {{-- References --}}
    <div class="section">

        <h3>Reference Details</h3>

        @foreach($candidate->references as $reference)

            <div class="box">

                <p><strong>Name:</strong> {{ $reference->name }}</p>

                <p><strong>Designation:</strong> {{ $reference->designation }}</p>

                <p><strong>Mobile:</strong> {{ $reference->mobile }}</p>

                <p><strong>Phone:</strong> {{ $reference->phone }}</p>

            </div>

        @endforeach

    </div>

    {{-- Friend References --}}
    <div class="section">

        <h3>Friend References</h3>

        @foreach($candidate->friendReferences as $friend)

            <div class="box">

                <p><strong>Name:</strong> {{ $friend->name }}</p>

                <p><strong>Relationship:</strong> {{ $friend->relationship }}</p>

                <p><strong>Mobile:</strong> {{ $friend->mobile }}</p>

                <p><strong>Phone:</strong> {{ $friend->phone }}</p>

            </div>

        @endforeach

    </div>

</body>

</html>
