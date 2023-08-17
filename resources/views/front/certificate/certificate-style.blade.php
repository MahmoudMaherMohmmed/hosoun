<style>
  @font-face {
    font-family: 'hebah';
    src: url({{ asset('front/fonts/hebah.ttf') }});
    font-weight: 400;
  }

  @font-face {
    font-family: 'sanaa';
    src: url({{ asset('front/fonts/mj_sanaa.ttf') }});
    font-weight: 400;
  }

  body .certificate {
    font-family: 'sanaa';
    line-height: 1.7;
  }

  .certificate-img {
    position: relative;
    z-index: 0;
    aspect-ratio: 9.45/6.68;
    width: 100%;
    height: 100%;
    margin: 0 auto;
    background: no-repeat center/contain url({{ asset('front/img/certificate.png') }});
  }

  .certificate .content {
    width: 80%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: clamp(1rem, 2.8vw, 3rem);
    color: #0E3C54;
    text-align: center
  }

  @media only screen and (min-width: 576px) {
    .certificate .content {
      font-size: clamp(1rem, 2.4vw, 3rem);
    }
  }


  @media only screen and (min-width: 992px) {
    .certificate .content {
      font-size: clamp(1rem, 1.8vw, 3rem);
    }
  }

  .certificate .content p {
    margin: 0
  }

  .certificate .content .foot {
    font-family: 'hebah';
  }


  .btn-print {
    margin: auto;
    display: block;
    width: 120px;
    height: 50px;
    cursor: pointer;
    background-color: green;
    color: white;
    border: 3px solid #D9D9D9;
    font-size: 25px
  }

  @page {
    size: A4 landscape;
    margin: 0;
  }

  @media print {
    @page {
      margin: 0;
      size: A4 landscape;
    }

    .btn-print {
      display: none;
    }

    @font-face {
      font-family: 'hebah';
      src: url({{ asset('front/fonts/hebah.ttf') }});
      font-weight: 400;
    }

    @font-face {
      font-family: 'sanaa';
      src: url({{ asset('front/fonts/mj_sanaa.ttf') }});
      font-weight: 400;
    }

    html,
    body {
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0
    }

    body .certificate {
      font-family: 'sanaa';
      line-height: 2.2
    }

    .certificate.print {
      max-width: 100% !important;
    }

    .certificate-img {
      position: relative;
      z-index: 0;
      aspect-ratio: 9/6;
      width: 100%;
      height: 100%;
      margin: 0 auto;
      background: no-repeat center/fill url({{ asset('front/img/certificate.png') }});
    }

    .certificate .content {
      width: 80%;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 1.8rem;
      color: #0E3C54;
      text-align: center
    }

    /* @media (min-width: 576px) {
      .certificate .content {
        font-size: clamp(1rem, 2.4vw, 3rem);
      }
    }


    @media (min-width: 992px) {
      .certificate .content {
        font-size: clamp(1rem, 1.8vw, 3rem);
      }
    } */

    .certificate .content .foot {
      font-family: 'hebah';
    }

  }
</style>
