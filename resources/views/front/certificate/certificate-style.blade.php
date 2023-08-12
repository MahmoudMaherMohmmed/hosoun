<style>
    @font-face {
        font-family: 'riyad-bank';
        src: url({{asset('fonts/riyad-bank-Regular.ttf')}});
        font-weight: 400;
    }

    @font-face {
        font-family: 'riyad-bank';
        src: url({{asset('fonts/riyad-bank-Bold.ttf')}});
        font-weight: 700;
    }

    body {
        font-family: 'riyad-bank';
        font-size: 16px;
        line-height: 2;
    }

    .certificate-img {
        text-align: center;
        background: no-repeat center/cover #FFF url({{asset('img/bg.png')}});
        width: 792px;
        height: 500px;
        padding-top: 50px;
        border: 1px solid #EEE;
    }

    .certificate p {
        font-size: 18px;
        margin: 0;
    }

    .certificate p.accent-color {
        color: #C89F22;
        font-size: 24px;
        font-weight: 700;
        margin: 15px 0;
    }

    .head {
        padding: 0 100px;
    }

    .head img,
    .foot img {
        width: 100%;
    }

    .foot {
        position: relative;
    }

    .foot .stamp {
        width: 120px;
        height: 120px;
        position: absolute;
        left: 100px;
        bottom: 50px;
    }

    .foot .stamp img {
        width: 100%;
        height: 100%;
        -o-object-fit: contain;
        object-fit: contain;

    }
    .btn-print{
        margin: auto;display: block;width: 120px;height: 50px;cursor: pointer;background-color: green;color: white;border: 3px solid #D9D9D9;font-size: 25px
    }
    @page {
        size: A4 landscape;
        margin: 0;
    }

    @media print {
        .btn-print{
            display: none;
        }
        @font-face {
            font-family: 'riyad-bank';
            src: url({{asset('fonts/riyad-bank-Regular.ttf')}});
            font-weight: 400;
        }

        @font-face {
            font-family: 'riyad-bank';
            src: url({{asset('fonts/riyad-bank-Bold.ttf')}});
            font-weight: 700;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
        }


        body {
            font-family: 'riyad-bank';
            font-size: 16px;
            line-height: 2;
        }

        .certificate-img {
            width: 100%;
            height: 100%;
            text-align: center;
            background: no-repeat center/cover #FFF url({{asset('img/bg.png')}});
            padding: 70px 0 30px;
            border: none;
        }

        .certificate p {
            font-size: 25px;
            margin: 0;
        }

        .certificate p.accent-color {
            color: #C89F22;
            font-size: 35px;
            font-weight: 700;
            margin: 15px 0;
        }

        .head {
            padding: 0 135px;
        }

        .head img,
        .foot img {
            width: 100%;
        }

        .foot {
            position: relative;
        }

        .foot .stamp {
            width: 160px;
            height: 160px;
            position: absolute;
            left: 135px;
            bottom: 70px;
        }

        .foot .stamp img {
            width: 100%;
            height: 100%;
            -o-object-fit: contain;
            object-fit: contain;

        }
    }
</style>