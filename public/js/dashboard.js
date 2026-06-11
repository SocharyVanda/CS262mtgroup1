
function switchTab(name, el) {
    document.querySelectorAll('.db-section').forEach(s => s.classList.remove('visible'));
    document.querySelectorAll('.db-navitem').forEach(b => b.classList.remove('active'));
    document.getElementById('tab-' + name).classList.add('visible');
    el.classList.add('active');
}

function previewImage(event) {
    const file = event.target.files[0];
    if (!file) return;

    const preview = document.getElementById('img-preview');
    const label = document.getElementById('img-label');
    const icon = document.getElementById('img-icon');
    const drop = document.getElementById('img-drop');

    const reader = new FileReader();
    reader.onload = function (e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
        label.textContent = file.name;
        icon.style.color = '#2563eb';
        drop.style.borderColor = '#3b82f6';
        drop.style.background = '#eff6ff';
    };
    reader.readAsDataURL(file);
}

