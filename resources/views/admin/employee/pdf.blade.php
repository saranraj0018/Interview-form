<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Employee Profile - {{ $employee->name }}</title>
    <!-- Tailwind CSS CDN (For browser viewing/HTML compile compatibility) -->
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">

    <style>
        /* DejaVu Sans font for Dompdf compatibility */
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 9.5px;
            color: #334155;
            line-height: 1.35;
            background-color: #ffffff;
            /* Clean white background */
            margin: 0;
            padding: 12px 15px;
        }

        .container {
            width: 100%;
        }

        /* Gradient top bar matching Rathinam Group Company List UI */
        .company-accent-bar {
            height: 4px;
            width: 100%;
            background-color: #4f6fff;
            background: linear-gradient(to right, #1a3faa, #4f6fff, #7c93ff);
            border-radius: 4px;
            margin-bottom: 10px;
        }

        /* Clean Executive Header Card */
        .header-card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-left: 4px solid #4f6fff;
            /* Thick brand blue left border */
            border-radius: 6px;
            padding: 10px 12px;
            margin-bottom: 10px;
        }

        .photo-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #cbd5e1;
        }

        .no-photo {
            width: 60px;
            height: 60px;
            border-radius: 4px;
            border: 1px dashed #cbd5e1;
            text-align: center;
            line-height: 60px;
            color: #94a3b8;
            font-size: 8.5px;
            display: inline-block;
            background-color: #f8fafc;
        }

        /* Section header bar with dark blue background */
        .section-header-bar {
            background-color: #0f1f5c;
            /* Dark Blue / Deep Navy */
            color: #ffffff;
            font-size: 8.5px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 3px 6px;
            border-radius: 3px;
            margin-top: 6px;
            margin-bottom: 5px;
        }

        /* Card Grid Layout */
        .card-grid {
            width: 100%;
            border-collapse: collapse;
        }

        .card-grid td {
            padding: 2px 4px;
            border: none;
            vertical-align: top;
        }

        /* Form-style Read-only Input Box */
        .field-box {
            background-color: #f8fafc;
            /* Soft slate/blue background */
            border: 1px solid #cbd5e1;
            /* Clean border outline */
            border-radius: 5px;
            padding: 4px 8px;
            margin-bottom: 4px;
        }

        .field-label {
            font-size: 6.5px;
            font-weight: bold;
            color: #64748b;
            text-transform: uppercase;
            margin-bottom: 2px;
            letter-spacing: 0.3px;
        }

        .field-value {
            font-size: 9px;
            font-weight: bold;
            color: #0f1f5c;
        }

        /* Family Details Table */
        .family-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2px;
        }

        .family-table th {
            background-color: #f0f4ff;
            color: #0f1f5c;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 7.5px;
            letter-spacing: 0.5px;
            padding: 5px 8px;
            text-align: left;
            border: 1px solid #cbd5e1;
        }

        .family-table td {
            padding: 5px 8px;
            border: 1px solid #cbd5e1;
            font-size: 8.5px;
            color: #334155;
        }

        .family-table tr:nth-child(even) td {
            background-color: #f8fafc;
        }

        .family-table td.family-name {
            font-weight: bold;
            color: #0f1f5c;
        }

        /* Signature block styling */
        .sig-line {
            border-bottom: 1.5px solid #cbd5e1;
            padding-bottom: 2px;
            width: 160px;
            margin-top: 6px;
        }

        .sig-text {
            font-family: Georgia, serif;
            font-style: italic;
            font-size: 13px;
            color: #0f1f5c;
        }

        .w-full {
            width: 100%;
        }

        .text-right {
            text-align: right;
        }

        .align-bottom {
            vertical-align: bottom;
        }
    </style>
</head>

<body>
    <div class="container">

        <div style="text-align: center; margin-bottom: 10px;">
            <img src="{{ public_path('assets/images/rathinamgroup.png') }}" style="height: 45px; width: auto;">
        </div>

        {{-- Gradient Accent Top Bar --}}
        <div class="company-accent-bar"></div>

        {{-- Top Executive Header Card --}}
        <div class="header-card">
            <table class="w-full" style="border-collapse: collapse;">
                <tr>
                    <td style="vertical-align: top; border: none; padding: 0;">
                        <div style="font-size: 7.5px; font-weight: bold; color: #4f6fff; letter-spacing: 1.5px; text-transform: uppercase; margin-bottom: 2px;">Interview Form Portal</div>
                        <h1 style="font-size: 18px; font-weight: bold; color: #0f1f5c; margin: 0 0 2px 0; text-transform: uppercase; letter-spacing: -0.5px;">{{ $employee->name }}</h1>
                        <div style="font-size: 10px; color: #5d6b98; font-weight: 600; margin-bottom: 6px;">{{ $employee->designation }} &bull; {{ $employee->department }}</div>
                        <div style="font-size: 8.5px; color: #64748b;">
                            Employee Code: <span style="color: #0f1f5c; font-weight: bold;">{{ $employee->employee_code }}</span> &nbsp;|&nbsp;
                            Joining Date: <span style="color: #0f1f5c; font-weight: bold;">{{ $employee->doj }}</span>
                        </div>
                    </td>
                    <td style="width: 65px; vertical-align: top; text-align: right; border: none; padding: 0;">
                        @if($employee->photo)
                        <img src="{{ public_path('uploads/employees/'.$employee->photo) }}" class="photo-img">
                        @else
                        <div class="no-photo">No Photo</div>
                        @endif
                    </td>
                </tr>
            </table>
        </div>

        {{-- Personal Information Section --}}
        <div class="section-header-bar">Personal Information</div>

        <table class="card-grid" style="margin-bottom: 6px;">
            <tr>
                <td style="width: 33.3%;">
                    <div class="field-box">
                        <div class="field-label">Date of Birth</div>
                        <div class="field-value">{{ $employee->dob }}</div>
                    </div>
                </td>
                <td style="width: 33.3%;">
                    <div class="field-box">
                        <div class="field-label">Gender</div>
                        <div class="field-value">{{ ucfirst($employee->gender) }}</div>
                    </div>
                </td>
                <td style="width: 33.3%;">
                    <div class="field-box">
                        <div class="field-label">Marital Status</div>
                        <div class="field-value">{{ ucfirst($employee->marital_status) }}</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="field-box">
                        <div class="field-label">Blood Group</div>
                        <div class="field-value">{{ $employee->blood_group }}</div>
                    </div>
                </td>
                <td>
                    <div class="field-box">
                        <div class="field-label">Contact Number</div>
                        <div class="field-value">{{ $employee->contact }}</div>
                    </div>
                </td>
                <td>
                    <div class="field-box">
                        <div class="field-label">Emergency Contact</div>
                        <div class="field-value">{{ $employee->emergency_contact }}</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="field-box">
                        <div class="field-label">Aadhaar Card</div>
                        <div class="field-value">{{ $employee->aadhaar }}</div>
                    </div>
                </td>
                <td>
                    <div class="field-box">
                        <div class="field-label">PAN Card</div>
                        <div class="field-value">{{ $employee->pan }}</div>
                    </div>
                </td>
                <td>
                    <div class="field-box">
                        <div class="field-label">Nominee</div>
                        <div class="field-value">{{ $employee->nominee }}</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="field-box">
                        <div class="field-label">Father's Name</div>
                        <div class="field-value">{{ $employee->father }}</div>
                    </div>
                </td>
                <td>
                    <div class="field-box">
                        <div class="field-label">Mother's Name</div>
                        <div class="field-value">{{ $employee->mother }}</div>
                    </div>
                </td>
                <td>
                    <div class="field-box">
                        <div class="field-label">Spouse Name</div>
                        <div class="field-value">{{ $employee->spouse ?? '-' }}</div>
                    </div>
                </td>
            </tr>
        </table>

        {{-- Address Details Section --}}
        <div class="section-header-bar">Address Details</div>

        <table class="card-grid" style="margin-bottom: 6px;">
            <tr>
                <td style="width: 50%;">
                    <div class="field-box">
                        <div class="field-label">Present Address</div>
                        <div class="field-value" style="font-weight: normal; color: #475569; min-height: 24px;">{{ $employee->present_address }}</div>
                    </div>
                </td>
                <td style="width: 50%;">
                    <div class="field-box">
                        <div class="field-label">Permanent Address</div>
                        <div class="field-value" style="font-weight: normal; color: #475569; min-height: 24px;">{{ $employee->permanent_address }}</div>
                    </div>
                </td>
            </tr>
        </table>

        {{-- Bank Details Section --}}
        <div class="section-header-bar">Bank Details</div>

        <table class="card-grid" style="margin-bottom: 6px;">
            <tr>
                <td style="width: 33.3%;">
                    <div class="field-box">
                        <div class="field-label">Bank Name</div>
                        <div class="field-value">{{ $employee->bank_name }}</div>
                    </div>
                </td>
                <td style="width: 33.3%;">
                    <div class="field-box">
                        <div class="field-label">Account Number</div>
                        <div class="field-value">{{ $employee->bank_account }}</div>
                    </div>
                </td>
                <td style="width: 33.3%;">
                    <div class="field-box">
                        <div class="field-label">IFSC Code</div>
                        <div class="field-value">{{ $employee->ifsc }}</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="field-box">
                        <div class="field-label">Branch Name</div>
                        <div class="field-value">{{ $employee->branch }}</div>
                    </div>
                </td>
                <td colspan="2">
                    <div class="field-box">
                        <div class="field-label">Bank Address</div>
                        <div class="field-value" style="font-weight: normal; color: #475569;">{{ $employee->bank_address }}</div>
                    </div>
                </td>
            </tr>
        </table>

        {{-- Family Details Section --}}
        <div class="section-header-bar">Family Details</div>

        <table class="family-table" style="margin-bottom: 12px;">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Relationship</th>
                    <th>Date of Birth</th>
                    <th style="text-align: center;">Residing With</th>
                </tr>
            </thead>
            <tbody>
                @forelse($employee->familyDetails as $family)
                <tr>
                    <td class="family-name">{{ $family->name }}</td>
                    <td>{{ $family->relationship }}</td>
                    <td>{{ $family->dob }}</td>
                    <td style="text-align: center;">{{ $family->residing_with ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align: center; color: #94a3b8; font-style: italic; padding: 6px;">
                        No family details provided.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Verification Block --}}
        <table class="w-full border-collapse" style="margin-top: 10px;">
            <tr>
                <td class="align-bottom" style="width: 50%;">
                    <div style="font-size: 8px; color: #94a3b8;">
                        Generated dynamically on {{ date('d-m-Y') }}<br>
                        Official Onboarding Profile Document &bull; Rathinam Group
                    </div>
                </td>
                <td class="align-bottom text-right" style="width: 50%;">
                    <div style="display: inline-block; text-align: left; width: 170px;">
                        <div style="font-size: 8px; font-weight: bold; color: #64748b; text-transform: uppercase; margin-bottom: 2px; letter-spacing: 0.5px;">Employee Signature</div>
                        <div class="sig-line">
                            <span class="sig-text">{{ $employee->signature }}</span>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>