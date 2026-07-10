<div
    style="background: linear-gradient(135deg, #0f766e 0%, #14b8a6 50%, #0ea5e9 100%); border: 1px solid #a7f3d0; border-radius: 1rem; padding: 1.25rem; color: #ffffff; box-shadow: 0 10px 25px rgba(15, 23, 42, 0.12);">
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1rem;">
        <div style="max-width: 680px;">
            <p
                style="margin: 0; font-size: 0.8rem; font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; color: #d1fae5;">
                Panel Admin
            </p>
            <h2 style="margin: 0.35rem 0 0.45rem; font-size: 1.35rem; font-weight: 700;">
                Selamat datang di Sterilmedical Admin
            </h2>
            <p style="margin: 0; font-size: 0.95rem; line-height: 1.6; color: #ecfdf5;">
                Kelola konten website, pengaturan, dan data penting dengan cepat melalui panel yang lebih rapi dan
                modern.
            </p>
        </div>

        <div
            style="background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.25); border-radius: 0.75rem; padding: 0.75rem 1rem; min-width: 140px; text-align: center;">
            <p
                style="margin: 0; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.12em; color: #d1fae5;">
                Hari ini
            </p>
            <p style="margin: 0.2rem 0 0; font-size: 1.05rem; font-weight: 700;">
                {{ now()->translatedFormat('d M Y') }}
            </p>
        </div>
    </div>
</div>
