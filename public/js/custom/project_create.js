"use strict";

/**
 * 現在登録されている対象スキルの数をカウント
 * @param {Array} records
 * @returns トータルレコード数
 */
const recordCounter = records => records.length - 1;

/**
 * recordを追加
 * @param {object} e
 */
const addRecord = (e) => {

    const parentElement = e.target.parentElement;

    let parentId = parentElement.id;
    let datasName = "";
    let placeholderStr = "";
    switch (parentId) {
        case "language":
            datasName = 'langs';
            placeholderStr = '言語';
            break
        case "framework":
            datasName = 'frameworks';
            placeholderStr = 'フレームワーク';
            break
        case "database":
            datasName = 'databases';
            placeholderStr = 'データベース';
            break
        case "middleware":
            datasName = 'middleware';
            placeholderStr = 'ミドルウェア';
            break
        case "os":
            datasName = 'os';
            placeholderStr = 'OS';
            break
        case "server":
            datasName = 'servers';
            placeholderStr = 'サーバー';
            break
        case "virtual_environment":
            datasName = 'virtualEnvironments';
            placeholderStr = '仮想環境';
            break
        case "version_management":
            datasName = 'versionManagement';
            placeholderStr = 'バージョン管理';
            break
    }
    // TODO::問題発生　内容以下
    // 言語を追加して更新すると最初のレコードが消える
    // 問題発生までの流れ
    // カスタム属性でIDを連番で付与
    // ひとつ前のレコードのカスタム属性のIDを、name="used_${parentId}[${lastRecordId}]"に使用　今まではレコードコウントを使用していた
    // 新しい要素を作成して追加する
    const previousSibling = e.target.previousElementSibling;
    // console.log(previousSibling,"previousSibling");
    // let recordsCount = [...previousSibling.children].length-1;
    const recordEls = [...previousSibling.children];
    const lastRecordId = recordEls.pop().dataset.recordid;
    const lastRecordIdAddOne = lastRecordId ? parseInt(lastRecordId) + 1 : 0;
    console.log(lastRecordId, "lastRecordId");
    let recordsCount = recordCounter(recordEls);
    console.log(recordsCount, "recordsCount");
    const newElement = document.createElement("div");
    newElement.classList.add("grid-record");
    newElement.dataset.recordid = lastRecordIdAddOne;
    newElement.innerHTML = `<div class="grid-ritem minus-btn" onclick="removeRecord(event)"><i class="fas fa-minus"></i></div>
    <div class="grid-ritem">
        <input type="text" name="used_${parentId}[${lastRecordIdAddOne}]" list="used_${parentId}"
            class="skill-input form-control" placeholder="${placeholderStr}を入力" required>
        <datalist id="used_${parentId}">
            @foreach (${datasName} as $data)
                <option value="{{ $data->name }}"></option>
            @endforeach
        </datalist>
    </div>`;

    previousSibling.append(newElement);
}

/**
 * recordを削除
 * @param {object} e
 */
const removeRecord = (e) => {
    console.log(e.target, "e.target");
    let record = e.target.closest(".grid-record");
    let parentElement = record.parentElement;
    record.remove();
    const recordsCount = recordCounter([...parentElement.children]);
    console.log(recordsCount, "recordsCount");

}
