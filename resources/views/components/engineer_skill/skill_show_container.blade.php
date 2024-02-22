<div class="skills-container">
    <div class="inner-container card w-25 p-3">
        <div class="head-title w-100 pb-3 border-bottom d-flex justify-content-center align-items-center">
            {{ $title }}
        </div>
        <div id="recordContainer">

            @foreach ($engineerSkills as $data)
                <div class="record border-bottom py-2">
                    <input type="hidden" name="target" value="{{ $keyword }}">
    
                    <div class="item">
                        {{ $data->name }}
                    </div>
                    <div class="item">
                        {{ $data->experience_months }}ヵ月
                    </div>
                    <!-- Modal -->
                </div>

            @endforeach
        </div>
    </div>
</div>
