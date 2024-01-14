<div class="skills-container">
    <div class="inner-container card w-25 p-3">
        <div class="head-title w-100 pb-3 border-bottom d-flex justify-content-center align-items-center">
            言語
        </div>
        <div id="recordContainer">

            @foreach ($engineerSkills as $data)
                <form action="{{ url('/skills', $data->id) }}" method="POST" class="record border-bottom py-2">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="target" value="Language">
                    <div class="item">
                        <!-- Button trigger modal -->
                        {{-- <i class="fas fa-minus delete-btn"data-toggle="modal"
                            data-target="#deleteLangModal{{ $data->id }}"></i> --}}
                        <i class="fas fa-edit edit-btn"data-toggle="modal"
                            data-target="#editLangModal{{ $data->id }}"></i>
                    </div>
                    <div class="item">
                        {{ $data->name }}
                    </div>
                    <div class="item">
                        {{ $data->experience_months }}ヵ月
                        {{-- <input type="number" name="month" class="month-input"
                            value="{{ $data->experience_months }}">ヵ月 --}}
                    </div>
                    <!-- Modal -->
                    {{-- 編集用モーダル --}}
                    <div class="modal fade" id="editLangModal{{ $data->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="editLangModal{{ $data->id }}Title" aria-hidden="true">

                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="edit-record">
                                        <span data-dismiss="modal">
                                            <i class="far fa-trash-alt delete-btn" data-toggle="modal"
                                                data-target="#deleteLangModal{{ $data->id }}"></i>
                                        </span>
                                        <div>{{ $data->name }}</div>
                                        <div>{{ $data->experience_months }}ヵ月</div>
                                        <div><i class="fas fa-arrow-right"></i></div>
                                        <div>
                                            <input type="number" name="experience_months"
                                                class="month-input border rounded"
                                                value="{{ $data->experience_months }}" min="1">ヵ月
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-around">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                                    <button type="submit" class="btn btn-primary">更新</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                {{-- 削除用モーダル --}}
                <div class="modal fade" id="deleteLangModal{{ $data->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="deleteLangModal{{ $data->id }}Label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ url('/skills', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="target" value="Language">

                                <div class="modal-header">
                                    {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body d-flex justify-content-center argin-items-center">
                                    <span class="mx-3 font-weight-bold">【{{ $data->name }}】</span>をリストから削除しますか？
                                </div>
                                <div class="modal-footer d-flex justify-content-around">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                                    <button type="submit" class="btn btn-danger">削除</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- </form> --}}
        </div>
        <div class="btns w-100 mt-3">
            <div class="dummy"></div>

            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addLangModal">
                追加
            </button>

            {{-- 言語の追加 --}}
            <div class="modal fade" id="addLangModal" tabindex="-1" role="dialog" aria-labelledby="addLangModalTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <form action="{{ url('/skills') }}" method="POST" class="modal-content">
                        @csrf
                        <input type="hidden" name="target" value="Language" class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="record">
                                <div class="item">

                                    <input type="text" name="language" list="kenpo" class="skill-input"
                                        required placeholder="言語入力してください">
                                    <datalist id="kenpo">
                                        @foreach ($langs as $lang)
                                            <option value="{{ $lang->name }}">
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="item">
                                    <input type="number" name="month" class="month-input" value="1"
                                        required>ヵ月
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                            <button type="submit" class="btn btn-primary">登録</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
