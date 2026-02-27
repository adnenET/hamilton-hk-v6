Hamilton HK — V2.3 (Sécurité + Backups + Journal)
Date: 2026-02-27

✅ Token API pour toutes les écritures (POST) via X-Auth-Token
✅ Validation serveur + sanitisation front
✅ Journal d’activité (audit_trail.json) + page logs.html
✅ Script backup.php pour cron
✅ Endpoint POST backup_now (token requis)
✅ Créer /data/backups (775)

Fichiers:
- /api/config.php  (HK_TOKEN)
- /backup.php      (cron)
- /logs.html       (admin viewer)
- /data/audit_trail.json
- /data/backups/*.zip
