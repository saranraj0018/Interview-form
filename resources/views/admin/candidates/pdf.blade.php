<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Candidate Profile - {{ $candidate->full_name }}</title>
    <!-- Tailwind CSS CDN (For browser viewing/HTML compile compatibility) -->
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">

    <style>
    /* DejaVu Sans font for Dompdf compatibility */
    body {
        font-family: 'DejaVu Sans', sans-serif;
        font-size: 9px;
        color: #334155;
        line-height: 1.35;
        background-color: #ffffff;
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

    /* Section divider bar with dark blue background */
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
        page-break-inside: avoid;
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
        font-size: 8.5px;
        font-weight: bold;
        color: #0f1f5c;
    }

    /* Experience cards */
    .experience-card {
        border: 1px solid #cbd5e1;
        background-color: #f8fafc;
        border-radius: 5px;
        padding: 6px 10px;
        margin-bottom: 6px;
        page-break-inside: avoid;
    }

    .experience-header {
        font-size: 9px;
        font-weight: bold;
        color: #0f1f5c;
        margin-bottom: 4px;
    }

    /* Data table styles */
    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 2px;
        margin-bottom: 8px;
        page-break-inside: avoid;
    }

    .data-table th {
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

    .data-table td {
        padding: 5px 8px;
        border: 1px solid #cbd5e1;
        font-size: 8.5px;
        color: #334155;
    }

    .data-table tr:nth-child(even) td {
        background-color: #f8fafc;
    }

    .footer {
        margin-top: 15px;
        font-size: 8px;
        color: #94a3b8;
        text-align: center;
        border-top: 1px solid #f1f5f9;
        padding-top: 6px;
    }

    .w-full {
        width: 100%;
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

        {{-- Executive Profile Header Card --}}
        <div class="header-card">
            <table class="w-full" style="border-collapse: collapse;">
                <tr>
                    <td style="vertical-align: top; border: none; padding: 0;">
                        <div
                            style="font-size: 7.5px; font-weight: bold; color: #4f6fff; letter-spacing: 1.5px; text-transform: uppercase; margin-bottom: 2px;">
                            Candidate Assessment</div>
                        <h1
                            style="font-size: 18px; font-weight: bold; color: #0f1f5c; margin: 0 0 2px 0; text-transform: uppercase; letter-spacing: -0.5px;">
                            {{ $candidate->full_name }}
                        </h1>
                        <div style="font-size: 10px; color: #5d6b98; font-weight: 600; margin-bottom: 6px;">Applied for:
                            {{ $candidate->position_applied }}
                        </div>
                        <div style="font-size: 8.5px; color: #64748b;">
                            Email: <span style="color: #0f1f5c; font-weight: bold;">{{ $candidate->email }}</span>
                            &nbsp;|&nbsp;
                            Mobile: <span style="color: #0f1f5c; font-weight: bold;">{{ $candidate->mobile }}</span>
                            &nbsp;|&nbsp;
                            Experience: <span style="color: #0f1f5c; font-weight: bold;">{{ $candidate->experience }}
                                Years</span>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        {{-- Personal Information Section --}}
        <div class="section-header-bar">Personal Information</div>
        <table class="card-grid">
            <tr>
                <td style="width: 25%;">
                    <div class="field-box">
                        <div class="field-label">Full Name</div>
                        <div class="field-value">{{ $candidate->full_name }}</div>
                    </div>
                </td>
                <td style="width: 25%;">
                    <div class="field-box">
                        <div class="field-label">Gender</div>
                        <div class="field-value">{{ ucfirst($candidate->gender) }}</div>
                    </div>
                </td>
                <td style="width: 25%;">
                    <div class="field-box">
                        <div class="field-label">Date of Birth</div>
                        <div class="field-value">{{ $candidate->dob }}</div>
                    </div>
                </td>
                <td style="width: 25%;">
                    <div class="field-box">
                        <div class="field-label">Age</div>
                        <div class="field-value">{{ $candidate->age }} Years</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="field-box">
                        <div class="field-label">Email Address</div>
                        <div class="field-value" style="font-size: 8px;">{{ $candidate->email }}</div>
                    </div>
                </td>
                <td>
                    <div class="field-box">
                        <div class="field-label">Mobile Number</div>
                        <div class="field-value">{{ $candidate->mobile }}</div>
                    </div>
                </td>
                <td>
                    <div class="field-box">
                        <div class="field-label">Alternative Phone</div>
                        <div class="field-value">{{ $candidate->phone ?? '-' }}</div>
                    </div>
                </td>
                <td>
                    <div class="field-box">
                        <div class="field-label">Marital Status</div>
                        <div class="field-value">{{ ucfirst($candidate->marital_status) }}</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="field-box">
                        <div class="field-label">Position Applied</div>
                        <div class="field-value">{{ $candidate->position_applied }}</div>
                    </div>
                </td>
                <td>
                    <div class="field-box">
                        <div class="field-label">Experience</div>
                        <div class="field-value">{{ $candidate->experience }} Years</div>
                    </div>
                </td>
                <td>
                    <div class="field-box">
                        <div class="field-label">Notice Period</div>
                        <div class="field-value">{{ $candidate->notice_period }}</div>
                    </div>
                </td>
                <td>
                    <div class="field-box">
                        <div class="field-label">Target Joining</div>
                        <div class="field-value">{{ $candidate->joining_date }}</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="field-box">
                        <div class="field-label">Current Gross</div>
                        <div class="field-value">
                            {{ is_numeric($candidate->current_gross) ? '₹' . number_format($candidate->current_gross) : $candidate->current_gross }}
                        </div>
                    </div>
                </td>
                <td>
                    <div class="field-box">
                        <div class="field-label">Expected Gross</div>
                        <div class="field-value">
                            {{ is_numeric($candidate->expected_gross) ? '₹' . number_format($candidate->expected_gross) : $candidate->expected_gross }}
                        </div>
                    </div>
                </td>
                <td>
                    <div class="field-box">
                        <div class="field-label">Pincode</div>
                        <div class="field-value">{{ $candidate->pin_code }}</div>
                    </div>
                </td>


                <td>
                    <div class="field-box">
                        <div class="field-label">Certifications</div>
                        <div class="field-value" style="font-size: 8px;">{{ $candidate->certifications ?? '-' }}</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="field-box">
                        <div class="field-label">Sunday Work</div>
                        <div class="field-value" style="font-size: 8px;">{{ $candidate->sunday_work }}</div>
                    </div>
                </td>
                <td colspan="4">
                    <div class="field-box">
                        <div class="field-label">Contact Address</div>
                        <div class="field-value" style="font-weight: normal; color: #475569;">
                            {{ $candidate->contact_address }}
                        </div>
                    </div>
                </td>
            </tr>
            <!-- <tr>
                <td colspan="4">
                    <div class="field-box">
                        <div class="field-label">Contact Address</div>
                        <div class="field-value" style="font-weight: normal; color: #475569;">
                            {{ $candidate->contact_address }}
                        </div>
                    </div>
                </td>
            </tr> -->

        </table>

        {{-- Education Details --}}
        <div class="section-header-bar">Education Details</div>
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width: 25%;">Degree/Course</th>
                    <th style="width: 30%;">College/School</th>
                    <th style="width: 25%;">Board/University</th>
                    <th style="width: 10%; text-align: center;">Marks</th>
                    <th style="width: 10%; text-align: center;">Year</th>
                </tr>
            </thead>
            <tbody>
                @foreach($candidate->educations as $education)
                <tr>
                    <td style="font-weight: bold; color: #0f1f5c;">{{ $education->degree }}</td>
                    <td>{{ $education->college }}</td>
                    <td>{{ $education->university }}</td>
                    <td style="text-align: center; font-weight: bold;">{{ $education->marks }}</td>
                    <td style="text-align: center;">{{ $education->year }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Experience Details --}}
        @if(count($candidate->experiences) > 0)
        <div class="section-header-bar">Work Experience Details</div>
        @foreach($candidate->experiences as $experience)
        <div class="experience-card">
            <table class="w-full" style="border-collapse: collapse; margin-bottom: 4px;">
                <tr>
                    <td style="font-weight: bold; color: #0f1f5c; font-size: 10px; border: none; padding: 0;">
                        {{ $experience->organization }}
                    </td>
                    <td
                        style="text-align: right; color: #4f6fff; font-weight: bold; font-size: 8.5px; border: none; padding: 0;">
                        {{ $experience->from_date }} &mdash; {{ $experience->to_date }}
                    </td>
                </tr>
            </table>
            <div style="border-top: 1px dashed #cbd5e1; margin-bottom: 4px;"></div>
            <table class="card-grid">
                <tr>
                    <td style="width: 33.3%;">
                        <div class="field-label" style="font-size: 6px;">Designation</div>
                        <div class="field-value" style="font-size: 8px;">{{ $experience->designation }}</div>
                    </td>
                    <td style="width: 33.3%;">
                        <div class="field-label" style="font-size: 6px;">Gross Salary / CTC</div>
                        <div class="field-value" style="font-size: 8px;">
                            {{ is_numeric($experience->gross_salary) ? '₹' . number_format($experience->gross_salary) : $experience->gross_salary }}
                            /
                            {{ is_numeric($experience->annual_ctc) ? '₹' . number_format($experience->annual_ctc) : $experience->annual_ctc }}
                        </div>
                    </td>
                    <td style="width: 33.3%;">
                        <div class="field-label" style="font-size: 6px;">Reason for Leaving</div>
                        <div class="field-value" style="font-size: 8px; font-weight: normal; color: #475569;">
                            {{ $experience->reason_for_leaving }}
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        @endforeach
        @endif

        {{-- Languages Known --}}
        <div class="section-header-bar">Languages Known</div>
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width: 40%;">Language</th>
                    <th style="width: 15%; text-align: center;">Read</th>
                    <th style="width: 15%; text-align: center;">Write</th>
                    <th style="width: 15%; text-align: center;">Speak</th>
                    <th style="width: 15%; text-align: center;">Understand</th>
                </tr>
            </thead>
            <tbody>
                @foreach($candidate->languages as $language)
                <tr>
                    <td style="font-weight: bold; color: #0f1f5c;">{{ $language->language }}</td>
                    <td style="text-align: center; font-weight: bold;">
                        {{ $language->can_read ? 'Yes' : 'No' }}
                    </td>
                    <td style="text-align: center; font-weight: bold;">
                        {{ $language->can_write ? 'Yes' : 'No' }}
                    </td>
                    <td style="text-align: center; font-weight: bold;">
                        {{ $language->can_speak ? 'Yes' : 'No' }}
                    </td>
                    <td style="text-align: center; font-weight: bold;">
                        {{ $language->can_understand ? 'Yes' : 'No' }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Family Details --}}
        @if(count($candidate->families) > 0)
        <div class="section-header-bar">Family Details</div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th style="width: 8%; text-align: center;">Age</th>
                    <th>Relationship</th>
                    <th>Occupation</th>
                    <th style="width: 12%; text-align: center;">Dependent</th>
                    <th>Contact No</th>
                </tr>
            </thead>
            <tbody>
                @foreach($candidate->families as $family)
                <tr>
                    <td style="font-weight: bold; color: #0f1f5c;">{{ $family->name }}</td>
                    <td style="text-align: center;">{{ $family->age }}</td>
                    <td>{{ $family->relationship }}</td>
                    <td>{{ $family->occupation }}</td>
                    <td style="text-align: center; font-weight: bold;">{{ $family->dependent }}</td>
                    <td>{{ $family->contact }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        {{-- References & Friend References side by side --}}
        @if(count($candidate->references) > 0 || count($candidate->friendReferences) > 0)
        <table class="w-full" style="border-collapse: collapse; margin-top: 5px; page-break-inside: avoid;">
            <tr>
                {{-- References --}}
                <td style="width: 48.5%; vertical-align: top; border: none; padding: 0;">
                    @if(count($candidate->references) > 0)
                    <div
                        style="font-size: 8px; font-weight: bold; color: #0f1f5c; text-transform: uppercase; margin-bottom: 5px; letter-spacing: 0.8px; border-bottom: 1.5px solid #cbd5e1; padding-bottom: 2px;">
                        Professional References</div>
                    @foreach($candidate->references as $reference)
                    <div class="field-box" style="margin-bottom: 5px;">
                        <div style="font-size: 9px; font-weight: bold; color: #0f1f5c;">{{ $reference->name }}</div>
                        <div style="font-size: 7px; color: #64748b; margin-bottom: 2px; text-transform: uppercase;">
                            {{ $reference->designation }}
                        </div>
                        <div style="font-size: 8px; color: #334155;">Mobile: <span
                                style="font-weight: bold; color: #0f1f5c;">{{ $reference->mobile }}</span></div>
                        @if($reference->phone)
                        <div style="font-size: 8px; color: #334155;">Phone: <span
                                style="font-weight: bold; color: #0f1f5c;">{{ $reference->phone }}</span></div>
                        @endif
                    </div>
                    @endforeach
                    @endif
                </td>

                <td style="width: 3%; border: none;"></td>

                {{-- Friend References --}}
                <td style="width: 48.5%; vertical-align: top; border: none; padding: 0;">
                    @if(count($candidate->friendReferences) > 0)
                    <div
                        style="font-size: 8px; font-weight: bold; color: #0f1f5c; text-transform: uppercase; margin-bottom: 5px; letter-spacing: 0.8px; border-bottom: 1.5px solid #cbd5e1; padding-bottom: 2px;">
                        Friend/Relative References</div>
                    @foreach($candidate->friendReferences as $friend)
                    <div class="field-box" style="margin-bottom: 5px;">
                        <div style="font-size: 9px; font-weight: bold; color: #0f1f5c;">{{ $friend->name }}</div>
                        <div style="font-size: 7px; color: #64748b; margin-bottom: 2px; text-transform: uppercase;">
                            Relationship: {{ $friend->relationship }}</div>
                        <div style="font-size: 8px; color: #334155;">Mobile: <span
                                style="font-weight: bold; color: #0f1f5c;">{{ $friend->mobile }}</span></div>
                        @if($friend->phone)
                        <div style="font-size: 8px; color: #334155;">Phone: <span
                                style="font-weight: bold; color: #0f1f5c;">{{ $friend->phone }}</span></div>
                        @endif
                    </div>
                    @endforeach
                    @endif
                </td>
            </tr>
        </table>

        <table class="card-grid">
            <tr>
                <td style="width: 33%;">
                    <div class="field-box">
                        <div class="field-label">Declaration Date</div>
                        <div class="field-value">{{ $candidate->declaration_date ?? '-' }}</div>
                    </div>
                </td>
                <td style="width: 33%;">
                    <div class="field-box">
                        <div class="field-label">Place </div>
                        <div class="field-value">{{ $candidate->place ?? '-' }}</div>
                    </div>
                </td>
                <td style="width: 33%;">
                    <div class="field-box">
                        <div class="field-label">Signature </div>
                        <div class="field-value">{{ $candidate->signature ?? '-' }}</div>
                    </div>
                </td>
            </tr>

        </table>
        @endif

        {{-- Footer --}}
        <div class="footer">
            Generated dynamically on {{ date('d-m-Y') }} &bull; Confidential Candidate Assessment Dossier &bull;
            Rathinam Group
        </div>


    </div>
</body>

</html>