@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
    <h2 class="page-title">Admin</h2>

    {{-- フィルターフォーム --}}
    <form method="GET" action="{{ route('admin.index') }}" class="filter-form">
        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="名前やメールアドレスを入力してください">
        <select name="gender">
            <option value="">性別</option>
            <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
            <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
        </select>
        <select name="category_id">
            <option value="">お問い合わせの種類</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->content }}
                </option>
            @endforeach
        </select>
        <input type="date" name="date" value="{{ request('date') }}">
        <div class="button-area">
            <button type="submit" class="btn">検索</button>
        <a href="{{ route('admin.index') }}" class="btn btn-reset">リセット</a>
    </div>
    </form>

    {{-- 上部：エクスポートとページネーションを横並び --}}
    <div class="top-controls">
        <form method="GET" action="{{ route('admin.export') }}" class="export-area">
            <input type="hidden" name="keyword" value="{{ request('keyword') }}">
            <input type="hidden" name="gender" value="{{ request('gender') }}">
            <input type="hidden" name="category_id" value="{{ request('category_id') }}">
            <input type="hidden" name="date" value="{{ request('date') }}">
            <button type="submit" class="export-btn">エクスポート</button>
        </form>

        <div class="pagination-wrapper">
            {{ $contacts->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>

    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th>詳細</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td>@if ($contact->gender === 1) 男性 @elseif ($contact->gender === 2) 女性 @else その他 @endif</td>
                <td>{{ $contact->email }}</td>
                <td>{{ optional($contact->category)->content ?? '未分類' }}</td>
                <td><a href="#" class="detail-btn" onclick='showModal(@json($contact))'>詳細</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div id="modal-bg" class="modal-bg" style="display: none;"></div>

    <div id="detail-modal" class="modal" style="display: none;">
  <button onclick="closeModal()" class="modal-close">×</button>

  <div class="modal-content">
    <div class="label">お名前：</div><div class="value" id="modal-name"></div>
    <div class="label">性別：</div><div class="value" id="modal-gender"></div>
    <div class="label">メールアドレス：</div><div class="value" id="modal-email"></div>
    <div class="label">電話番号：</div><div class="value" id="modal-tel"></div>
    <div class="label">住所：</div><div class="value" id="modal-address"></div>
    <div class="label">建物名：</div><div class="value" id="modal-building"></div>
    <div class="label">お問い合わせの種類：</div><div class="value" id="modal-category"></div>
    <div class="label">お問い合わせ内容：</div><div class="value" id="modal-detail"></div>

    <!-- ボタンを2カラムの中央にするために colspan風に1列使わせる -->
    <div class="button-wrapper" style="grid-column: 1 / -1; text-align: center;">
      <form method="POST" action="" id="delete-form">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-delete">削除</button>
      </form>
    </div>
  </div>
</div>



    <form method="POST" action="" id="delete-form">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-delete">削除</button>
    </form>
</div>

    <script>
    function showModal(contact) {
        document.getElementById('modal-name').innerText = contact.last_name + ' ' + contact.first_name;
        document.getElementById('modal-gender').innerText = contact.gender === 1 ? '男性' : contact.gender === 2 ? '女性' : 'その他';
        document.getElementById('modal-email').innerText = contact.email;
        document.getElementById('modal-tel').innerText = contact.tel;
        document.getElementById('modal-address').innerText = contact.address;
        document.getElementById('modal-building').innerText = contact.building;
        document.getElementById('modal-category').innerText = contact.category && contact.category.content ? contact.category.content : '未分類';
        document.getElementById('modal-detail').innerText = contact.detail;
        document.getElementById('modal-bg').style.display = 'block';
        document.getElementById('detail-modal').style.display = 'block';
        document.getElementById('delete-form').action = `/admin/delete/${contact.id}`;
    }

    function closeModal() {
        document.getElementById('modal-bg').style.display = 'none';
        document.getElementById('detail-modal').style.display = 'none';
    }
    </script>
@endsection
