@php 
    if(isset($subcat)){
        $base_route = 'category.page';
    }elseif(isset($childcat)){
        $base_route = 'subcategory.page';
    }else{
        $base_route = 'childcategory.page';
    }
@endphp
<div class="d-flex flex-wrap align-items-center mb-4">
    <span class="fw-light mb-4">{{ $courses->count() }} {{ __('frontstaticword.SearchResults') }}</span>
    <div class="d-flex align-items-center justify-content-end mb-4 ms-auto">
        {{-- Sort --}}
        <div class="sortby me-4">
        <select data-placeholder="{{ __('frontstaticword.Sort') }}" name="resort">
            {{-- a must for placehoder --}}
            <option></option>
            {{-- /a must for placehoder --}}
            <option value="{{ route($base_route,['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->title)), 'sortby' => 'a-z' ]) }}">
                {{ __('frontstaticword.AZSort') }}
            </option>
            <option value="{{ route($base_route,['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->title)), 'sortby' => 'z-a' ]) }}">
                {{ __('frontstaticword.ZASort') }}
            </option>
            <option value="{{ route($base_route,['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->title)), 'sortby' => 'newest' ]) }}">
                {{ __('frontstaticword.Newest') }}
            </option>
            <option value="{{ route($base_route,['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->title)), 'sortby' => 'featured' ]) }}">
                {{ __('frontstaticword.Featured') }}
            </option>
            <option value="{{ route($base_route,['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->title)), 'sortby' => 'l-h' ]) }}">
                {{ __('frontstaticword.LowToHigh') }}
            </option>
            <option value="{{ route($base_route,['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->title)), 'sortby' => 'h-l' ]) }}">
                {{ __('frontstaticword.HighToLow') }}
            </option>
        </select>
        </div>
        {{-- Search Result --}}
        <div class="sortby">
        <select data-placeholder="{{ __('frontstaticword.SearchResults') }}" name="search-result">
            {{-- a must for placehoder --}}
            <option></option>
            {{-- /a must for placehoder --}}
            <option value="{{ route($base_route,['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->title)), 'limit' => '10' ]) }}">10</option>
            <option value="{{ route($base_route,['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->title)), 'limit' => '30' ]) }}">30</option>
            <option value="{{ route($base_route,['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->title)), 'limit' => '50' ]) }}">50</option>
            <option value="{{ route($base_route,['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->title)), 'limit' => '100' ]) }}">100</option>
        </select>
        </div>
    </div>
</div>