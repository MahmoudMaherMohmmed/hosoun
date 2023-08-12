<section class="certificate-img">
    <div class="head">
        <img src="{{asset('img/head.png')}}" alt="certificate-head">
    </div>
    <div class="content">
        <p>يشهد المركز العربي للتدريب التربوي لدول الخليج حضور</p>
        <p style="font-size: x-large;font-weight: bolder">{{auth()->user()->fname ?? ''}}  {{ auth()->user()->lname ?? '' }}</p>
        <p class="accent-color"> البرنامج التدريبي {{$course['title']}}</p>
        <p> {{$enDate}}م بواقع {{$duration}} ساعات تدريبية </p>
        <p>وبناءً على ذلك تم منح هذه الشهادة.</p>
    </div>
    <div class="foot">
        <img src="{{asset('img/foot.png')}}" alt="certificate-foot">
        <div class="stamp">
            <img src="{{asset('img/stamp.png')}}" alt="certificate-stamp">
        </div>
    </div>
</section>