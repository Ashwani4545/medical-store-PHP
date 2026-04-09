// Vindhyavasini Medical Store — Main Script

document.addEventListener('DOMContentLoaded', function () {

  // ── Cart Count from localStorage ──
  function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem('vms_cart') || '[]');
    const badge = document.getElementById('cartCount');
    if (badge) badge.textContent = cart.length;
  }
  updateCartCount();

  // ── Add to Cart ──
  document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
    btn.addEventListener('click', function () {
      const product = {
        id: this.dataset.id || Date.now(),
        name: this.dataset.name,
        price: this.dataset.price
      };
      const cart = JSON.parse(localStorage.getItem('vms_cart') || '[]');
      cart.push(product);
      localStorage.setItem('vms_cart', JSON.stringify(cart));
      updateCartCount();
      showToast(product.name + ' added to cart!');
    });
  });

  // ── Toast Notification ──
  function showToast(msg, type = 'success') {
    let toast = document.getElementById('vms-toast');
    if (!toast) {
      toast = document.createElement('div');
      toast.id = 'vms-toast';
      toast.style.cssText = `
        position:fixed;bottom:30px;left:50%;transform:translateX(-50%);
        background:${type === 'success' ? 'var(--emerald)' : '#dc3545'};
        color:#fff;padding:12px 28px;border-radius:50px;font-weight:600;
        font-size:.9rem;z-index:99999;box-shadow:0 8px 24px rgba(0,0,0,.3);
        transition:opacity .3s;opacity:0;
      `;
      document.body.appendChild(toast);
    }
    toast.textContent = msg;
    toast.style.opacity = '1';
    setTimeout(() => { toast.style.opacity = '0'; }, 2800);
  }
  window.showToast = showToast;

  // ── FAQ Accordion ──
  document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', function () {
      const answer = this.nextElementSibling;
      const icon = this.querySelector('.faq-icon');
      const isOpen = answer.classList.contains('show');
      // close all
      document.querySelectorAll('.faq-answer').forEach(a => a.classList.remove('show'));
      document.querySelectorAll('.faq-question').forEach(b => { b.classList.remove('active'); });
      document.querySelectorAll('.faq-icon').forEach(i => { if (i) i.textContent = '+'; });
      if (!isOpen) {
        answer.classList.add('show');
        this.classList.add('active');
        if (icon) icon.textContent = '−';
      }
    });
  });

  // ── Chat Widget ──
  const chatBtn    = document.getElementById('chatToggleBtn');
  const chatBox    = document.getElementById('chatBox');
  const chatClose  = document.getElementById('chatClose');
  const chatSend   = document.getElementById('chatSendBtn');
  const chatInput  = document.getElementById('chatInput');
  const chatMsgs   = document.getElementById('chatMessages');

  if (chatBtn) {
    chatBtn.addEventListener('click', () => chatBox.classList.toggle('open'));
    chatClose.addEventListener('click', () => chatBox.classList.remove('open'));

    const botReplies = [
      "Thank you for reaching out! How can I help you today?",
      "Our team will get back to you shortly.",
      "You can call us at +91 9584990009 for urgent queries.",
      "We offer 24/7 customer support for all medical needs.",
      "Please visit our services page for more information."
    ];

    function addMsg(sender, text) {
      const div = document.createElement('div');
      div.className = 'chat-msg ' + sender;
      div.textContent = text;
      chatMsgs.appendChild(div);
      chatMsgs.scrollTop = chatMsgs.scrollHeight;
    }

    function sendMsg() {
      const msg = chatInput.value.trim();
      if (!msg) return;
      addMsg('user', msg);
      chatInput.value = '';
      setTimeout(() => {
        const reply = botReplies[Math.floor(Math.random() * botReplies.length)];
        addMsg('bot', reply);
      }, 800);
    }

    chatSend.addEventListener('click', sendMsg);
    chatInput.addEventListener('keypress', e => { if (e.key === 'Enter') sendMsg(); });
  }

  // ── Newsletter Form ──
  const nlForm = document.getElementById('newsletterForm');
  if (nlForm) {
    nlForm.addEventListener('submit', function (e) {
      e.preventDefault();
      const email = this.querySelector('input[type="email"]').value;
      if (email) {
        showToast('Subscribed successfully!');
        this.reset();
      }
    });
  }

  // ── Scroll reveal ──
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.style.opacity = '1';
        e.target.style.transform = 'translateY(0)';
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.reveal').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'opacity .6s ease, transform .6s ease';
    observer.observe(el);
  });

  // ── BP Monitoring Form ──
  const bpForm = document.getElementById('bpForm');
  if (bpForm) {
    const readings = JSON.parse(localStorage.getItem('vms_bp') || '[]');
    renderBP(readings);

    bpForm.addEventListener('submit', function (e) {
      e.preventDefault();
      const systolic  = parseInt(document.getElementById('systolic').value);
      const diastolic = parseInt(document.getElementById('diastolic').value);
      const now = new Date();
      readings.unshift({
        systolic, diastolic,
        time: now.toLocaleString()
      });
      localStorage.setItem('vms_bp', JSON.stringify(readings.slice(0, 20)));
      renderBP(readings);
      this.reset();
      showToast('Blood pressure recorded!');
    });

    function getBPStatus(sys, dia) {
      if (sys < 90 || dia < 60)   return { label: 'Low', cls: 'bp-low' };
      if (sys <= 120 && dia <= 80) return { label: 'Normal', cls: 'bp-normal' };
      return { label: 'High', cls: 'bp-high' };
    }

    function renderBP(list) {
      const ul = document.getElementById('bpList');
      if (!ul) return;
      ul.innerHTML = list.length === 0
        ? '<li class="text-muted-custom text-center py-4">No readings recorded yet.</li>'
        : list.map(r => {
            const s = getBPStatus(r.systolic, r.diastolic);
            return `<li class="bp-reading-item">
              <div>
                <strong>${r.systolic}/${r.diastolic} mmHg</strong>
                <div style="font-size:.78rem;color:var(--text-mute)">${r.time}</div>
              </div>
              <span class="bp-status ${s.cls}">${s.label}</span>
            </li>`;
          }).join('');
    }
  }

  // ── Equipment Rental ──
  const rentalForm = document.getElementById('rentalForm');
  if (rentalForm) {
    const rates = { Wheelchair: 20, Crutches: 10, 'Hospital Bed': 50, Walker: 15, 'CPAP Machine': 30 };
    document.getElementById('duration').addEventListener('input', calcCost);
    document.getElementById('equipment').addEventListener('change', calcCost);

    function calcCost() {
      const eq  = document.getElementById('equipment').value;
      const dur = parseInt(document.getElementById('duration').value) || 0;
      const preview = document.getElementById('costPreview');
      if (eq && dur && rates[eq] && preview) {
        preview.textContent = `Estimated Cost: $${rates[eq] * dur} (${dur} days × $${rates[eq]}/day)`;
      }
    }

    rentalForm.addEventListener('submit', function (e) {
      e.preventDefault();
      const fd   = new FormData(this);
      const eq   = fd.get('equipment');
      const dur  = parseInt(fd.get('duration'));
      const cost = (rates[eq] || 0) * dur;

      document.getElementById('billName').textContent     = fd.get('name');
      document.getElementById('billEmail').textContent    = fd.get('email');
      document.getElementById('billPhone').textContent    = fd.get('phone');
      document.getElementById('billAltPhone').textContent = fd.get('altPhone');
      document.getElementById('billEquipment').textContent= eq;
      document.getElementById('billDuration').textContent = dur + ' days';
      document.getElementById('billTotal').textContent    = '$' + cost;

      document.getElementById('rentalDetails').style.display = 'block';
      document.getElementById('rentalDetails').scrollIntoView({ behavior: 'smooth' });
    });

    const payBtn = document.getElementById('payNowBtn');
    if (payBtn) {
      payBtn.addEventListener('click', function () {
        document.getElementById('billSection').style.display = 'block';
        document.getElementById('billSection').scrollIntoView({ behavior: 'smooth' });
        showToast('Payment successful! Equipment booked.');
      });
    }
    const printBtn = document.getElementById('printBillBtn');
    if (printBtn) printBtn.addEventListener('click', () => window.print());
    const cancelBtn = document.getElementById('cancelRentBtn');
    if (cancelBtn) cancelBtn.addEventListener('click', () => { rentalForm.reset(); document.getElementById('rentalDetails').style.display='none'; });
  }

  // ── Appointment Confirmation ──
  window.confirmAppointment = function () {
    const fields = ['apptName','apptAge','apptGender','apptPhone','apptEmail','apptDoctor'];
    const vals = fields.map(id => document.getElementById(id)?.value);
    if (vals.some(v => !v)) { showToast('Please fill all fields.', 'error'); return; }
    const doctor = vals[5];
    if (confirm(`Confirm appointment with ${doctor}?`)) {
      const msg = document.getElementById('apptConfirmMsg');
      msg.textContent = `Appointment confirmed with ${doctor}. A confirmation SMS will be sent.`;
      msg.className = 'alert-success-custom mt-3';
      msg.style.display = 'block';
    }
  };

  // ── Generic form success ──
  document.querySelectorAll('.generic-form').forEach(form => {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      const feedback = this.querySelector('.form-feedback');
      if (feedback) {
        feedback.innerHTML = '<i class="bi bi-check-circle me-2"></i>Your request has been submitted successfully!';
        feedback.className = 'form-feedback alert-success-custom mt-3';
        feedback.style.display = 'block';
      }
      showToast('Submitted successfully!');
      setTimeout(() => this.reset(), 2000);
    });
  });

});
