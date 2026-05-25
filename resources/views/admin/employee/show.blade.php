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
            max-width: 1100px;
            margin: 0 auto;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid rgba(234, 36, 152, 0.12);
            box-shadow: 0 4px 40px rgba(234, 36, 152, 0.08);
        }

        .irv-accent {
            height: 5px;
            background: linear-gradient(90deg, #ea2498, #f472b6, #fce7f3);
        }

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
        }

        .irv-back {
            background: #fdf0f7;
            border: 1px solid rgba(234, 36, 152, 0.25);
            color: #ea2498;
            padding: 8px 18px;
            border-radius: 10px;
            font-size: .8rem;
            text-decoration: none;
        }

        .irv-back:hover {
            background: #fce7f3;
        }

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

        .s-label {
            font-size: .67rem;
            color: #c084a0;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .s-value {
            font-size: .92rem;
            font-weight: 600;
            color: #2d0a1e;
        }

        .irv-body {
            background: #fdf0f7;
            padding: 1.5rem 2rem;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

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

        .irv-box {
            background: #fff;
            border-radius: 16px;
            border: 1px solid #fce7f3;
            overflow: hidden;
        }

        .irv-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }

        .irv-cell {
            padding: 1rem 1.2rem;
            border-right: 1px solid #fdf0f7;
            border-bottom: 1px solid #fdf0f7;
        }

        .irv-cell:nth-child(3n) {
            border-right: none;
        }

        .irv-cell .label {
            font-size: .67rem;
            color: #c084a0;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .irv-cell .value {
            font-size: .9rem;
            color: #2d0a1e;
            font-weight: 500;
        }

        .irv-table-wrap {
            background: #fff;
            border-radius: 16px;
            border: 1px solid #fce7f3;
            overflow: hidden;
        }

        .irv-table {
            width: 100%;
            border-collapse: collapse;
        }

        .irv-table thead tr {
            background: #ea2498;
        }

        .irv-table thead th {
            padding: 12px;
            color: white;
            text-align: left;
            font-size: .72rem;
            text-transform: uppercase;
        }

        .irv-table tbody td {
            padding: 12px;
            border-bottom: 1px solid #fdf0f7;
            font-size: .85rem;
            color: #2d0a1e;
        }

        .irv-table tbody tr:hover {
            background: #fdf0f7;
        }

        .emp-photo {
            width: 110px;
            height: 110px;
            border-radius: 18px;
            object-fit: cover;
            border: 3px solid #fce7f3;
        }

        .sign-photo {
            width: 140px;
            height: 60px;
            object-fit: contain;
        }

    </style>

    <div class="irv">

        <div class="irv-card">

            {{-- Accent --}}
            <div class="irv-accent"></div>

            {{-- Header --}}
            <div class="irv-header">

                <div>
                    <div class="irv-header-tag">HR · Employee</div>
                    <h2>Employee Profile</h2>
                </div>

              <div style="display:flex; gap:10px;">

    <a href="{{ route('admin.employee.download', $employee->id) }}"
       class="irv-back"
       style="background:#dcfce7; color:#15803d; border-color:#bbf7d0;">

        Download PDF

    </a>

    <a href="{{ route('admin.employee.index') }}"
       class="irv-back">

        ← Back

    </a>

</div>

            </div>

            {{-- Top Stats --}}
            <div class="irv-stats">

                <div class="irv-stat">
                    <div class="s-label">Employee Name</div>
                    <div class="s-value">{{ $employee->name }}</div>
                </div>

                <div class="irv-stat">
                    <div class="s-label">Designation</div>
                    <div class="s-value">{{ $employee->designation }}</div>
                </div>

                <div class="irv-stat">
                    <div class="s-label">Department</div>
                    <div class="s-value">{{ $employee->department }}</div>
                </div>

                <div class="irv-stat">
                    <div class="s-label">Employee Code</div>
                    <div class="s-value">{{ $employee->employee_code }}</div>
                </div>

            </div>

            <div class="irv-body">

                {{-- Employee Info --}}
                <div>

                    <div class="irv-section-title">
                        Personal Information
                    </div>

                    <div class="irv-box">

                        <div class="irv-grid">

                            <div class="irv-cell">
                                <div class="label">Date of Joining</div>
                                <div class="value">{{ $employee->doj }}</div>
                            </div>

                            <div class="irv-cell">
                                <div class="label">Date of Birth</div>
                                <div class="value">{{ $employee->dob }}</div>
                            </div>

                            <div class="irv-cell">
                                <div class="label">Gender</div>
                                <div class="value">{{ $employee->gender }}</div>
                            </div>

                            <div class="irv-cell">
                                <div class="label">Contact</div>
                                <div class="value">{{ $employee->contact }}</div>
                            </div>

                            <div class="irv-cell">
                                <div class="label">Emergency Contact</div>
                                <div class="value">{{ $employee->emergency_contact }}</div>
                            </div>

                            <div class="irv-cell">
                                <div class="label">Marital Status</div>
                                <div class="value">{{ $employee->marital_status }}</div>
                            </div>

                            <div class="irv-cell">
                                <div class="label">Father</div>
                                <div class="value">{{ $employee->father }}</div>
                            </div>

                            <div class="irv-cell">
                                <div class="label">Mother</div>
                                <div class="value">{{ $employee->mother }}</div>
                            </div>

                            <div class="irv-cell">
                                <div class="label">Spouse</div>
                                <div class="value">{{ $employee->spouse ?? '-' }}</div>
                            </div>

                            <div class="irv-cell">
                                <div class="label">Blood Group</div>
                                <div class="value">{{ $employee->blood_group }}</div>
                            </div>

                            <div class="irv-cell">
                                <div class="label">Aadhaar</div>
                                <div class="value">{{ $employee->aadhaar }}</div>
                            </div>

                            <div class="irv-cell">
                                <div class="label">PAN</div>
                                <div class="value">{{ $employee->pan }}</div>
                            </div>

                        </div>

                    </div>

                </div>

                {{-- Address --}}
                <div>

                    <div class="irv-section-title">
                        Address Details
                    </div>

                    <div class="irv-box">

                        <div class="irv-grid">

                            <div class="irv-cell">
                                <div class="label">Present Address</div>
                                <div class="value">{{ $employee->present_address }}</div>
                            </div>

                            <div class="irv-cell">
                                <div class="label">Permanent Address</div>
                                <div class="value">{{ $employee->permanent_address }}</div>
                            </div>

                            <div class="irv-cell">
                                <div class="label">Nominee</div>
                                <div class="value">{{ $employee->nominee }}</div>
                            </div>

                        </div>

                    </div>

                </div>

                {{-- Bank --}}
                <div>

                    <div class="irv-section-title">
                        Bank Details
                    </div>

                    <div class="irv-box">

                        <div class="irv-grid">

                            <div class="irv-cell">
                                <div class="label">Bank Account</div>
                                <div class="value">{{ $employee->bank_account }}</div>
                            </div>

                            <div class="irv-cell">
                                <div class="label">Bank Name</div>
                                <div class="value">{{ $employee->bank_name }}</div>
                            </div>

                            <div class="irv-cell">
                                <div class="label">Branch</div>
                                <div class="value">{{ $employee->branch }}</div>
                            </div>

                            <div class="irv-cell">
                                <div class="label">IFSC</div>
                                <div class="value">{{ $employee->ifsc }}</div>
                            </div>

                            <div class="irv-cell">
                                <div class="label">Bank Address</div>
                                <div class="value">{{ $employee->bank_address }}</div>
                            </div>

                        </div>

                    </div>

                </div>

                {{-- Photo --}}
                <div>

                    <div class="irv-section-title">
                        Employee Photo & Signature
                    </div>

                    <div class="irv-box p-6 flex gap-10 items-center">

                        <div>
                            <div class="label mb-2">Photo</div>

                            <img src="{{ asset('uploads/employees/'.$employee->photo) }}"
     class="emp-photo">
                        </div>

                                <div class="mt-6">
                <div class="text-sm font-semibold text-gray-600 mb-2">
                    Employee Signature
                </div>

                <div class="border-t border-gray-400 pt-3 w-64">
                    <span style="
                        font-family: cursive;
                        font-size: 34px;
                        color:#111827;
                    ">
                        {{ $employee->signature }}
                    </span>
                </div>
            </div>

                    </div>

                </div>

                {{-- Family Details --}}
                <div>

                    <div class="irv-section-title">
                        Family Details
                    </div>

                    <div class="irv-table-wrap">

                        <table class="irv-table">

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
                                        <td colspan="4" style="text-align:center;">
                                            No Family Details Found
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-layouts.app>
