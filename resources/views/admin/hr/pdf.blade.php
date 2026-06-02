<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Interview Summary - {{ $interview->candidate->full_name }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
            color: #334155;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }

        .container {
            padding: 10px;
        }

        /* Header block styling */
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border-bottom: 3px solid #0f1f5c;
            padding-bottom: 12px;
        }

        .header-table td {
            border: none;
            padding: 0;
        }

        .company-title {
            font-size: 9px;
            font-weight: bold;
            color: #4f6fff;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 3px;
        }

        .interview-title {
            font-size: 22px;
            font-weight: bold;
            color: #0f1f5c;
            margin: 0 0 4px 0;
            text-transform: uppercase;
            letter-spacing: -0.5px;
        }

        .interview-sub {
            font-size: 12px;
            font-weight: 600;
            color: #64748b;
            margin-bottom: 6px;
        }

        .header-meta {
            font-size: 10px;
            color: #475569;
        }

        .header-meta span {
            color: #0f1f5c;
            font-weight: bold;
        }

        /* Section wrapper */
        .section-wrapper {
            margin-bottom: 18px;
            page-break-inside: avoid;
        }

        .section-header {
            font-size: 11px;
            font-weight: bold;
            color: #0f1f5c;
            text-transform: uppercase;
            letter-spacing: 1px;
            background-color: #f1f5f9;
            padding: 6px 10px;
            border-left: 4px solid #0f1f5c;
            margin-bottom: 8px;
        }

        /* Form/Info grids */
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
        }

        .info-table td {
            padding: 6px 8px;
            vertical-align: middle;
            border: 1px solid #e2e8f0;
        }

        .label-col {
            width: 22%;
            font-weight: bold;
            color: #475569;
            background-color: #f8fafc;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .value-col {
            width: 28%;
            color: #0f1f5c;
            font-weight: bold;
        }

        /* Ratings Table Styling */
        .ratings-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        .ratings-table th {
            background-color: #0f1f5c;
            color: #ffffff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 9px;
            letter-spacing: 0.5px;
            padding: 8px 10px;
            border: 1px solid #0f1f5c;
        }

        .ratings-table th small {
            font-weight: normal;
            font-size: 8px;
            color: #e2e8f0;
            display: block;
            margin-top: 2px;
            text-transform: none;
        }

        .ratings-table td {
            padding: 8px 10px;
            border: 1px solid #e2e8f0;
            font-size: 10px;
            color: #334155;
        }

        .ratings-table tr:nth-child(even) td {
            background-color: #f8fafc;
        }

        .text-center {
            text-align: center;
        }

        .score-value {
            font-weight: bold;
            color: #0f1f5c;
        }

        .total-row td {
            background-color: #e8edf5 !important;
            font-weight: bold;
            color: #0f1f5c;
            border-top: 2px solid #0f1f5c;
            font-size: 11px;
        }

        .footer {
            margin-top: 35px;
            font-size: 9px;
            color: #94a3b8;
            text-align: center;
            border-top: 1px solid #f1f5f9;
            padding-top: 8px;
        }
    </style>
</head>

<body>
    <div class="container">

        <div style="text-align: center; margin-bottom: 10px;">
            <img src="{{ public_path('assets/images/rathinamgroup.png') }}" style="height: 45px; width: auto;">
        </div>
        {{-- Executive Header Block --}}
        <table class="header-table">
            <tr>
                <td style="width: 100%; vertical-align: top;">
                    <div class="company-title">Interview Summary & Evaluation</div>
                    <h1 class="interview-title">Ratings Summary</h1>
                </td>
            </tr>
        </table>

        {{-- Candidate Info Section --}}
        <div class="section-wrapper">
            <div class="section-header">Candidate & Schedule Information</div>
            <table class="info-table">
                <tr>
                    <td class="label-col">Candidate Name</td>
                    <td class="value-col">{{ $interview->candidate->full_name }}</td>
                    <td class="label-col">Interview Date</td>
                    <td class="value-col">{{ \Carbon\Carbon::parse($interview->interview_date)->format('d M Y') }}</td>
                </tr>
                <tr>
                    <td class="label-col">Position Applied</td>
                    <td class="value-col">{{ $interview->candidate->position_applied ?? '-' }}</td>
                    <td class="label-col">Department</td>
                    <td class="value-col">{{ $interview->department }}</td>
                </tr>
            </table>
        </div>

<table>

    <thead>

        <tr>

            <th>Skills</th>

            @foreach($interview->emails as $email)

                <th class="text-center">

                    {{ $email->category->person_name }}

                    <br>

                    <small>
                        {{ $email->category->designation }}
                    </small>

                </th>

            @endforeach
  <th class="text-center">
                Overall
            </th>
        </tr>

    </thead>

    <tbody>

        @php
            $questions = $interview->emails->first()?->ratings;
        @endphp

        {{-- Questions --}}
        @foreach($questions as $index => $question)

            <tr>

                <td>
                    {{ $question->question }}
                </td>

                @foreach($interview->emails as $email)

                    @php
                        $rating = $email->ratings[$index]->rating ?? '-';
                    @endphp

                    <td class="text-center">

                        {{ $rating }}/5

                    </td>

                @endforeach
       @php

                    $overallScore = 0;

                    foreach($interview->emails as $email) {
                        $overallScore += $email->ratings[$index]->rating ?? 0;
                    }

                    $overallMax = count($interview->emails) * 5;

                @endphp

                <td class="text-center" style="font-weight:bold;color:green;">
                    {{ $overallScore }}/{{ $overallMax }}
                </td>
            </tr>

        @endforeach

        {{-- Total Score --}}
        <tr style="background:#fce7f3;">

            <td style="font-weight:bold; color:#ea2498;">

                Total Score

            </td>

            @foreach($interview->emails as $email)

               @php
                    $total = $email->ratings->sum('rating');
                    $max = $email->ratings->count() * 5;

                    $scoreOutOf100 = $max > 0
                        ? round(($total / $max) * 100)
                        : 0;
                @endphp

                <td class="text-center"
                    style="font-weight:bold; color:#ea2498;">

                    {{ $scoreOutOf100 }}/100

                </td>

            @endforeach

            @php

                $grandTotal = 0;
                $grandMax = 0;

                foreach($interview->emails as $email) {

                    $grandTotal += $email->ratings->sum('rating');
                    $grandMax += $email->ratings->count() * 5;

                }

                $overallScoreOutOf100 = $grandMax > 0
                    ? round(($grandTotal / $grandMax) * 100)
                    : 0;

            @endphp

            <td class="text-center"
                style="font-weight:bold;color:green;">

                {{ $overallScoreOutOf100 }}/100

            </td>

        </tr>

    </tbody>

</table>

        {{-- Footer --}}
        <div class="footer">
            Generated dynamically on {{ date('d-m-Y') }} &bull; Confidentially Logged HR Ratings Document
        </div>
    </div>
</body>

</html>
