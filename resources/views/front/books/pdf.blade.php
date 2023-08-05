<object data="{{asset('/images/books/'.$book->file)}}" type="application/pdf" frameborder="0" style="border: 0; top: 0; left: 0; width: 100%; height: 100%; position: absolute;">
    <embed src="{{asset('/images/books/'.$book->file)}}"/> 
</object>