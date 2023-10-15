<div>
    <form  class="php-email-form" wire:submit='save'>
        <div class="row gy-4">
          <div class="col-lg-6 form-group">
            <input type="text" name="name" wire:model.live='contact.name' class="form-control" id="name" placeholder="اسمك" required>
          </div>
          <div class="col-lg-6 form-group">
            <input type="tel" class="form-control" wire:model.live='contact.phone' name="phone" id="email" placeholder="رقم الهاتف" required>
          </div>
        </div>

        <div class="form-group">
            <input type="email" class="form-control" wire:model.live='contact.email' name="email" id="subject" placeholder="البريد الالكتروني" required>
          </div>
        <div class="form-group">
          <input type="text" class="form-control" wire:model.live='contact.subject' name="subject" id="subject" placeholder="العنوان" required>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="message"
          wire:model.live='contact.message' rows="5" placeholder="الرسالة" required></textarea>
        </div>
        <div class="my-3">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your message has been sent. Thank you!</div>
        </div>
        <div class="text-center"><button onclick="alert('تم ارسال رسالتك بنجاح سيتم التواصل معك قريبا')" type="submit">ارسال</button></div>
    </form>
    {{-- Because she competes with no one, no one can compete with her. --}}
</div>
