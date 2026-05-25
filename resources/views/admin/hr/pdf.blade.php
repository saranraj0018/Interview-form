<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>Interview Summary</title>

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
            margin-top: 30px;
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
            width: 200px;
            font-weight: bold;
            background: #f9f9f9;
        }

        .text-center {
            text-align: center;
        }

        .score {
            font-weight: bold;
            color: #ea2498;
        }

    </style>

</head>

<body>

    <h2>Interview Ratings Summary</h2>

    {{-- Candidate Info --}}
    <table class="info-table">

        <tr>
            <td>Candidate Name</td>
            <td>{{ $interview->candidate->full_name }}</td>
        </tr>

        <tr>
            <td>Position</td>
            <td>{{ $interview->candidate->position_applied ?? '-' }}</td>
        </tr>

        <tr>
            <td>Department</td>
            <td>{{ $interview->department }}</td>
        </tr>

        <tr>
            <td>Interview Date</td>
            <td>
                {{ \Carbon\Carbon::parse($interview->interview_date)->format('d M Y') }}
            </td>
        </tr>

    </table>

    {{-- Ratings Table --}}
  <h3>Interview Ratings Comparison</h3>

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
                @endphp

                <td class="text-center"
                    style="font-weight:bold; color:#ea2498;">

                    {{ $total }}/{{ $max }}

                </td>

            @endforeach

        </tr>

    </tbody>

</table>

</body>

</html>
