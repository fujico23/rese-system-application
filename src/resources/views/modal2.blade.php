<!-- Modal -->
<div id="myModal" class="modal__menu">
  <ul class="modal__menu__inner">
    <li>
      <label class="close" onclick="closeModal()" for="pop-up">
        <i class="fa-solid fa-square-xmark fa-lg" style="color: #0d09fb;"></i>
      </label>
    </li>
    <li class="modal__link"><a href="/">Home</a></li>
    <li class="modal__link"><a href="/Registration">Registration</a></li>
    <li class="modal__link"><a href="/login">Login</a></li>
  </ul>
</div>

<script>
  const modal = document.getElementById('myModal');

  // ページ読み込み時にモーダルを表示
  window.onload = function() {
    modal.style.display = 'block';
  }

  function closeModal() {
    modal.style.display = 'none';
  }
</script>