<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Interview Submitted</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Inter:wght@300;400;500&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f0fdf4;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .sub-box {
            text-align: center;
            max-width: 420px;
            width: 100%;
            animation: fadeUp .6s ease both;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Icon */
        .sub-icon-wrap {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background: linear-gradient(135deg, #dcfce7, #bbf7d0);
            border: 2px solid rgba(22, 163, 74, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            animation: pop .5s cubic-bezier(.34, 1.56, .64, 1) .2s both;
        }

        @keyframes pop {
            from {
                transform: scale(0.5);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .sub-icon-wrap svg {
            width: 52px;
            height: 52px;
        }

        /* Pill */
        .sub-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #dcfce7;
            border: 1px solid rgba(22, 163, 74, 0.2);
            color: #16a34a;
            font-family: 'Syne', sans-serif;
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            padding: 5px 14px;
            border-radius: 20px;
            margin-bottom: 1.25rem;
        }

        .sub-pill::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #16a34a;
            animation: blink 1.4s infinite;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: .3;
            }
        }

        .sub-box h2 {
            font-family: 'Syne', sans-serif;
            font-size: 1.8rem;
            font-weight: 800;
            color: #052e16;
            letter-spacing: -0.02em;
            margin-bottom: .8rem;
            line-height: 1.3;
        }

        .sub-box p {
            font-size: .95rem;
            color: #6da882;
            line-height: 1.7;
            margin-bottom: 2rem;
        }

        .sub-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 2rem;
        }

        .sub-divider::before,
        .sub-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(22, 163, 74, 0.15);
        }

        .sub-divider span {
            font-size: .72rem;
            color: #86c99a;
            font-family: 'Syne', sans-serif;
            letter-spacing: .06em;
        }

        .sub-info-cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 2rem;
        }

        .sub-info-card {
            background: #fff;
            border: 1px solid #dcfce7;
            border-radius: 14px;
            padding: .9rem 1rem;
            text-align: left;
        }

        .ic-label {
            font-size: .67rem;
            color: #86c99a;
            letter-spacing: .07em;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .ic-val {
            font-size: .85rem;
            font-weight: 500;
            color: #052e16;
        }

        .sub-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #16a34a;
            color: #fff;
            text-decoration: none;
            padding: 12px 28px;
            border-radius: 12px;
            font-family: 'Syne', sans-serif;
            font-size: .85rem;
            font-weight: 700;
            letter-spacing: .04em;
            transition: opacity .2s, transform .15s;
        }

        .sub-back-btn:hover {
            opacity: .88;
            transform: translateY(-1px);
        }
    </style>
</head>

<body>

<div class="sub-page">
<div class="sub-box">

    {{-- Icon --}}
    <div class="sub-icon-wrap">
        <svg viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="26" cy="26" r="22" stroke="#16a34a" stroke-width="2.5" fill="#f0fdf4"/>
            <path d="M16 26.5l7 7 13-14" stroke="#16a34a" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>

    {{-- Pill --}}
    <div class="sub-pill">Submitted Successfully</div>

    {{-- Title --}}
    <h2>Interview Submitted<br>Successfully!</h2>

    {{-- Description --}}
    <p>
        Thank you for submitting your interview feedback.<br>
        Your response has been recorded.
    </p>

</div>
</div>

</body>
</html>
