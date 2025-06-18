# 📚 School Tafels Oefen App

Een Laravel 12 webapplicatie waarmee kinderen tafelsommen kunnen oefenen, en docenten hun resultaten kunnen bekijken en beheren.

---

## ✅ Functionaliteiten

### 👩‍🎓 Voor Kinderen
- Inloggen als kind
- Kies een tafel (bijv. 2, 3, 4...) en oefen 20 vragen
- Na het oefenen wordt de score opgeslagen
- Kinderen kunnen hun eigen resultaten bekijken

### 👩‍🏫 Voor Docenten
- Inloggen als docent
- Kinderen beheren
- Scores bekijken en beheren
- Resultaten van alle kinderen bekijken en verwijderen

---

## 🔧 Installatie

1. **Clone het project:**

```bash
composer install
npm install && npm run dev

cp .env.example .env
php artisan key:generate

php artisan migrate

php artisan serve
```
Open daarna: http://localhost:8000
