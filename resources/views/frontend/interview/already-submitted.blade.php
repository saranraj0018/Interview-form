<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Already Submitted</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
@import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Inter:wght@300;400;500&display=swap');

.sub-page *{box-sizing:border-box;margin:0;padding:0;}

.sub-page{
    font-family:'Inter',sans-serif;
    background:#fdf0f7;
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:2rem;
}

.sub-box{
    text-align:center;
    max-width:420px;
    width:100%;
    animation:fadeUp .6s ease both;
}

@keyframes fadeUp{
    from{opacity:0;transform:translateY(24px);}
    to{opacity:1;transform:translateY(0);}
}

/* Icon circle */
.sub-icon-wrap{
    width:110px;
    height:110px;
    border-radius:50%;
    background:linear-gradient(135deg,#fce7f3,#fbcfe8);
    border:2px solid rgba(234,36,152,0.15);
    display:flex;
    align-items:center;
    justify-content:center;
    margin:0 auto 2rem;
    animation:pop .5s cubic-bezier(.34,1.56,.64,1) .2s both;
}

@keyframes pop{
    from{transform:scale(0.5);opacity:0;}
    to{transform:scale(1);opacity:1;}
}

.sub-icon-wrap svg{
    width:52px;
    height:52px;
}

/* Pill tag */
.sub-pill{
    display:inline-flex;
    align-items:center;
    gap:6px;
    background:#fce7f3;
    border:1px solid rgba(234,36,152,0.2);
    color:#ea2498;
    font-family:'Syne',sans-serif;
    font-size:.7rem;
    font-weight:700;
    letter-spacing:.1em;
    text-transform:uppercase;
    padding:5px 14px;
    border-radius:20px;
    margin-bottom:1.25rem;
}

.sub-pill::before{
    content:'';
    width:6px;
    height:6px;
    border-radius:50%;
    background:#ea2498;
    animation:blink 1.4s infinite;
}

@keyframes blink{
    0%,100%{opacity:1;}
    50%{opacity:.3;}
}

.sub-box h2{
    font-family:'Syne',sans-serif;
    font-size:1.6rem;
    font-weight:800;
    color:#2d0a1e;
    letter-spacing:-0.02em;
    margin-bottom:.75rem;
    line-height:1.25;
}

.sub-box p{
    font-size:.92rem;
    color:#c084a0;
    line-height:1.65;
    margin-bottom:2rem;
}

/* Divider */
.sub-divider{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:2rem;
}
.sub-divider::before,
.sub-divider::after{
    content:'';
    flex:1;
    height:1px;
    background:rgba(234,36,152,0.15);
}
.sub-divider span{
    font-size:.72rem;
    color:#e4a0c0;
    font-family:'Syne',sans-serif;
    letter-spacing:.06em;
}

/* Info cards */
.sub-info-cards{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:10px;
    margin-bottom:2rem;
}

.sub-info-card{
    background:#fff;
    border:1px solid #fce7f3;
    border-radius:14px;
    padding:.9rem 1rem;
    text-align:left;
}

.sub-info-card .ic-label{
    font-size:.67rem;
    color:#c084a0;
    letter-spacing:.07em;
    text-transform:uppercase;
    margin-bottom:4px;
}

.sub-info-card .ic-val{
    font-size:.85rem;
    font-weight:500;
    color:#2d0a1e;
}

/* Back button */
.sub-back-btn{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:#ea2498;
    color:#fff;
    text-decoration:none;
    padding:12px 28px;
    border-radius:12px;
    font-family:'Syne',sans-serif;
    font-size:.85rem;
    font-weight:700;
    letter-spacing:.04em;
    transition:opacity .2s, transform .15s;
}

.sub-back-btn:hover{
    opacity:.88;
    transform:translateY(-1px);
}
</style>

</head>

<body>


<div class="sub-page">
<div class="sub-box">

    {{-- Icon --}}
    <div class="sub-icon-wrap">
        <svg viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="26" cy="26" r="22" stroke="#ea2498" stroke-width="2.5" fill="#fdf0f7"/>
            <path d="M16 26.5l7 7 13-14" stroke="#ea2498" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>

    {{-- Pill --}}
    <div class="sub-pill">Already Submitted</div>

    {{-- Title --}}
    <h2>Interview Already<br>Submitted!</h2>

    {{-- Description --}}
    <p>
        This interview form has already been submitted.<br>
        You cannot submit it again.
    </p>

</div>
</div>

</body>
</html>



