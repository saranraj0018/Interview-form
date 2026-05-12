<x-layouts.app>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Inter:wght@300;400;500&display=swap');

        .irv * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .irv {
            font-family: 'Inter', sans-serif;
            background: #fdf0f7;
            min-height: 100vh;
            padding: 2rem;
        }

        .irv-card {
            max-width: 900px;
            margin: 0 auto;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid rgba(234, 36, 152, 0.12);
            box-shadow: 0 4px 40px rgba(234, 36, 152, 0.08);
        }

        /* Accent bar */
        .irv-accent {
            height: 5px;
            background: linear-gradient(90deg, #ea2498, #f472b6, #fce7f3);
        }

        /* Header */
        .irv-header {
            background: #fff;
            padding: 1.5rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #fce7f3;
        }

        .irv-header-tag {
            font-size: .68rem;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: #ea2498;
            font-family: 'Syne', sans-serif;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .irv-header h2 {
            font-family: 'Syne', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            color: #2d0a1e;
            letter-spacing: -0.02em;
        }

        .irv-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #fdf0f7;
            border: 1px solid rgba(234, 36, 152, 0.25);
            color: #ea2498;
            padding: 8px 18px;
            border-radius: 10px;
            font-size: .8rem;
            font-weight: 500;
            text-decoration: none;
            font-family: 'Inter', sans-serif;
            transition: background .2s;
        }

        .irv-back:hover {
            background: #fce7f3;
        }

        /* Stat strip */
        .irv-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            background: #fff;
        }

        .irv-stat {
            padding: 1rem 1.25rem;
            border-right: 1px solid #fce7f3;
        }

        .irv-stat:last-child {
            border-right: none;
        }

        .irv-stat .s-label {
            font-size: .67rem;
            color: #c084a0;
            letter-spacing: .08em;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .irv-stat .s-value {
            font-size: .92rem;
            font-weight: 500;
            color: #2d0a1e;
        }

        /* Body */
        .irv-body {
            background: #fdf0f7;
            padding: 1.5rem 2rem;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        /* Section title */
        .irv-section-title {
            font-family: 'Syne', sans-serif;
            font-size: .78rem;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: #ea2498;
            margin-bottom: .75rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .irv-section-title::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(234, 36, 152, 0.2);
        }

        /* Interviewer card */
        .irv-interviewer {
            background: #fff;
            border-radius: 16px;
            border: 1px solid #fce7f3;
            padding: 1.1rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .irv-avatar {
            width: 46px;
            height: 46px;
            border-radius: 14px;
            background: linear-gradient(135deg, #ea2498, #f472b6);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: .82rem;
            flex-shrink: 0;
            text-transform: uppercase;
        }

        .irv-interviewer .i-name {
            font-weight: 600;
            font-size: .95rem;
            color: #2d0a1e;
            font-family: 'Syne', sans-serif;
        }

        .irv-interviewer .i-role {
            font-size: .75rem;
            color: #c084a0;
            margin-top: 2px;
        }

        .irv-interviewer .i-badge {
            margin-left: auto;
        }

        /* Recommendation badge */
        .irv-rec-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 14px;
            border-radius: 20px;
            font-size: .75rem;
            font-weight: 600;
            font-family: 'Syne', sans-serif;
            letter-spacing: .03em;
        }

        .irv-rec-badge::before {
            content: '';
            width: 7px;
            height: 7px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .irv-rec-badge.selected {
            background: #d8f3e6;
            color: #1b5e38;
        }

        .irv-rec-badge.selected::before {
            background: #1b5e38;
        }

        .irv-rec-badge.rejected {
            background: #fee2e2;
            color: #991b1b;
        }

        .irv-rec-badge.rejected::before {
            background: #dc2626;
        }

        .irv-rec-badge.hold {
            background: #fef3c7;
            color: #92400e;
        }

        .irv-rec-badge.hold::before {
            background: #d97706;
        }

        .irv-rec-badge.pending {
            background: #fce7f3;
            color: #ea2498;
        }

        .irv-rec-badge.pending::before {
            background: #ea2498;
        }

        /* Ratings box */
        .irv-ratings-box {
            background: #fff;
            border-radius: 16px;
            border: 1px solid #fce7f3;
            overflow: hidden;
        }

        .irv-ratings-head {
            background: #ea2498;
            padding: .75rem 1.25rem;
        }

        .irv-ratings-head span {
            font-family: 'Syne', sans-serif;
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: #fff;
        }

        .irv-rating-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: .85rem 1.25rem;
            border-bottom: 1px solid #fdf0f7;
        }

        .irv-rating-row:last-child {
            border-bottom: none;
        }

        .irv-rating-row .r-question {
            font-size: .88rem;
            color: #2d0a1e;
        }

        /* Rating value badges */
        .irv-rb {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 14px;
            border-radius: 20px;
            font-size: .75rem;
            font-weight: 600;
            font-family: 'Syne', sans-serif;
            letter-spacing: .03em;
            text-transform: capitalize;
        }

        .irv-rb::before {
            content: '';
            width: 7px;
            height: 7px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .irv-rb.excellent {
            background: #d8f3e6;
            color: #1b5e38;
        }

        .irv-rb.excellent::before {
            background: #1b5e38;
        }

        .irv-rb.good {
            background: #dbeafe;
            color: #1e40af;
        }

        .irv-rb.good::before {
            background: #1e40af;
        }

        .irv-rb.average {
            background: #fef3c7;
            color: #92400e;
        }

        .irv-rb.average::before {
            background: #d97706;
        }

        .irv-rb.below {
            background: #fee2e2;
            color: #991b1b;
        }

        .irv-rb.below::before {
            background: #dc2626;
        }

        /* Empty */
        .irv-empty {
            text-align: center;
            padding: 2rem;
            color: #c084a0;
            font-size: .85rem;
        }

        /* Feedback box */
        .irv-fb-box {
            background: #fff;
            border-radius: 16px;
            border: 1px solid #fce7f3;
            overflow: hidden;
        }

        .irv-fb-comment {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #fdf0f7;
        }

        .irv-fb-comment .label {
            font-size: .68rem;
            color: #c084a0;
            letter-spacing: .07em;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .irv-fb-comment .text {
            font-size: .88rem;
            color: #2d0a1e;
            line-height: 1.6;
        }

        .irv-salaries {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }

        .irv-sal-cell {
            padding: .9rem 1.1rem;
            border-right: 1px solid #fdf0f7;
            border-top: 1px solid #fdf0f7;
        }

        .irv-sal-cell:nth-child(even) {
            border-right: none;
        }

        .irv-sal-cell .label {
            font-size: .67rem;
            color: #c084a0;
            letter-spacing: .07em;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .irv-sal-cell .val {
            font-size: .92rem;
            font-weight: 500;
            color: #2d0a1e;
        }

        /* Panel table */
        .irv-table-wrap {
            background: #fff;
            border-radius: 16px;
            border: 1px solid #fce7f3;
            overflow: hidden;
        }

        .irv-table {
            width: 100%;
            border-collapse: collapse;
            font-size: .85rem;
        }

        .irv-table thead tr {
            background: #ea2498;
        }

        .irv-table thead th {
            padding: 10px 14px;
            text-align: left;
            color: #fff;
            font-size: .68rem;
            letter-spacing: .08em;
            text-transform: uppercase;
            font-weight: 600;
            font-family: 'Syne', sans-serif;
        }

        .irv-table tbody tr {
            border-bottom: 1px solid #fdf0f7;
        }

        .irv-table tbody tr:last-child {
            border-bottom: none;
        }

        .irv-table tbody tr:hover {
            background: #fdf0f7;
        }

        .irv-table tbody td {
            padding: 10px 14px;
            color: #2d0a1e;
            vertical-align: top;
            font-size: .85rem;
        }
    </style>

    <div class="irv">
        <div class="irv-card">

            {{-- Accent bar --}}
            <div class="irv-accent"></div>

            {{-- Header --}}
            <div class="irv-header">
                <div>
                    <div class="irv-header-tag">HR · Assessment</div>
                    <h2>Interview Review</h2>
                </div>
                <a href="{{ route('admin.hr.view') }}" class="irv-back">← Back</a>
            </div>

            {{-- Candidate stat strip --}}
            <div class="irv-stats">
                <div class="irv-stat">
                    <div class="s-label">Candidate</div>
                    <div class="s-value">{{ $pivot->interview->candidate_name }}</div>
                </div>
                <div class="irv-stat">
                    <div class="s-label">Position</div>
                    <div class="s-value">{{ $pivot->interview->position }}</div>
                </div>
                <div class="irv-stat">
                    <div class="s-label">Department</div>
                    <div class="s-value">{{ $pivot->interview->department }}</div>
                </div>
                <div class="irv-stat">
                    <div class="s-label">Interview Date</div>
                    <div class="s-value">{{ \Carbon\Carbon::parse($pivot->interview->interview_date)->format('d M Y') }}
                    </div>
                </div>
            </div>

            <div class="irv-body">

                {{-- Interviewer --}}
                @php $feedback = $pivot->feedback; @endphp

                <div>
                    <div class="irv-section-title">Interviewer</div>
                    <div class="irv-interviewer">
                        <div class="irv-avatar">
                            {{ strtoupper(substr($pivot->category->name, 0, 2)) }}
                        </div>
                        <div>
                            <div class="i-name">{{ $pivot->category->name }}</div>
                            <div class="i-role">Interviewer</div>
                        </div>
                        <div class="i-badge">
                            @if ($feedback)
                                <span class="irv-rec-badge {{ $feedback->final_recommendation }}">
                                    {{ ucfirst($feedback->final_recommendation) }}
                                </span>
                            @else
                                <span class="irv-rec-badge pending">Pending</span>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Ratings --}}
                <div>
                    <div class="irv-section-title">Ratings</div>

                    @php

                        function getRatingLabel($mark)
                        {
                            return match ((int) $mark) {
                                5 => 'excellent',
                                4 => 'good',
                                3 => 'average',
                                2 => 'below',

                                default => 'unknown',
                            };
                        }

                        // ✅ Overall Total
                        $overallTotal = $pivot->ratings->sum(function ($item) {
                            return (int) $item->rating;
                        });

                    @endphp

                    <div class="irv-ratings-box">

                        {{-- Header --}}
                        <div class="irv-ratings-head flex items-center justify-between">

                            <span>Assessment Scores</span>

                            <span style="font-size:.75rem;">
                                Overall : {{ $overallTotal }}/55
                            </span>

                        </div>

                        {{-- Ratings --}}
                        @forelse($pivot->ratings as $rating)
                            @php
                                $label = getRatingLabel($rating->rating);
                            @endphp

                            <div class="irv-rating-row">

                                <span class="r-question">
                                    {{ $rating->question }}
                                </span>

                                <span class="irv-rb {{ $label }}">

                                    {{ ucfirst($label) }}
                                    ({{ $rating->rating }})
                                </span>

                            </div>

                        @empty

                            <div class="irv-empty">
                                No ratings submitted
                            </div>
                        @endforelse

                        {{-- ✅ Overall Footer --}}
                        <div class="irv-rating-row" style="background:#fdf0f7;font-weight:700;">

                            <span class="r-question">
                                Overall Rating
                            </span>

                            <span
                                style="
                background:#ea2498;
                color:#fff;
                padding:6px 14px;
                border-radius:20px;
                font-size:.8rem;
                font-family:'Syne',sans-serif;
            ">

                                {{ $overallTotal }} / 55

                            </span>

                        </div>

                    </div>
                </div>

                {{-- HR Feedback --}}
                <div>
                    <div class="irv-section-title">HR Feedback</div>
                    <div class="irv-fb-box">
                        <div class="irv-fb-comment">
                            <div class="label">Comments</div>
                            <div class="text">{{ $feedback->comments ?? '—' }}</div>
                        </div>
                        <div class="irv-salaries">
                            <div class="irv-sal-cell">
                                <div class="label">Present Salary</div>
                                <div class="val">{{ $feedback->present_salary ?? '—' }}</div>
                            </div>
                            <div class="irv-sal-cell">
                                <div class="label">Expected Salary</div>
                                <div class="val">{{ $feedback->expected_salary ?? '—' }}</div>
                            </div>
                            <div class="irv-sal-cell">
                                <div class="label">Proposed Gross</div>
                                <div class="val">{{ $feedback->proposed_gross ?? '—' }}</div>
                            </div>
                            <div class="irv-sal-cell">
                                <div class="label">Proposed CTC</div>
                                <div class="val">{{ $feedback->proposed_ctc ?? '—' }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Panel Members --}}
                <div>
                    <div class="irv-section-title">Panel Members</div>
                    <div class="irv-table-wrap">
                        <table class="irv-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Comments</th>
                                    <th>Signature</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pivot->panels as $panel)
                                    <tr>
                                        <td>{{ $panel->name }}</td>
                                        <td>{{ $panel->comments }}</td>
                                        <td>{{ $panel->signature }}</td>
                                        <td>{{ $panel->date }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="irv-empty">No panel data found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>{{-- /irv-body --}}

        </div>{{-- /irv-card --}}
    </div>{{-- /irv --}}

</x-layouts.app>
