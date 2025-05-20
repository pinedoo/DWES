# 🏋️‍♂️ TopNutritionFSC

TopNutritionFSC es una tienda online de suplementación y material deportivo desarrollada con **Next.js** y desplegada en **Vercel**.
Su objetivo es ofrecer una experiencia rápida, moderna y accesible para los usuarios interesados en mejorar su rendimiento físico y bienestar.

![Next.js](https://img.shields.io/badge/Next.js-13+-black?logo=nextdotjs)
![Vercel](https://img.shields.io/badge/Deployed%20on-Vercel-black?logo=vercel)
![TypeScript](https://img.shields.io/badge/Built%20with-TypeScript-blue?logo=typescript)

---

## 🚀 Características principales

- 🛒 Catálogo de suplementos y material deportivo
- 💳 Sistema de checkout e integración con Stripe
- 🌐 Internacionalización de la interfaz (i18n)
- 📦 Gestión de productos y pedidos
- ⚙️ Arquitectura escalable con `Next.js 13+` y `App Router`
- 🌍 Despliegue automático con Vercel

---

## 📁 Estructura del proyecto


```
TopNutritionFSC/
├── public/                 # Archivos estáticos
├── src/                    # Código fuente principal
│   ├── components/         # Componentes reutilizables
│   ├── pages/              # Rutas y vistas
│   ├── lib/                # Funciones auxiliares
│   └── ...                 # Otros módulos
├── .gitignore
├── README.md
├── next.config.ts
├── package.json
├── tsconfig.json
└── ...
```
## 🛠️ Tecnologías utilizadas
Next.js 13+ – Framework React para aplicaciones modernas

TypeScript – Tipado estático y desarrollo robusto

Stripe API – Procesamiento de pagos seguro

Vercel – Despliegue y hosting en la nube

ESLint & Prettier – Linting y formateo de código



## 🔧 Instalación y uso local

Clona el repositorio:

```bash
git clone https://github.com/SMG-web-dev/TopNutritionFSC.git
cd TopNutritionFSC
```
Instala las dependencias:

```bash
npm install
```
Crea un archivo .env.local con tus variables de entorno necesarias (Stripe keys, etc.)
Inicia el servidor de desarrollo:

```bash
npm run dev
```

## 🚀 Despliegue
El proyecto se encuentra desplegado automáticamente en Vercel, aprovechando las funcionalidades de integración continua.


## 📄 Licencia
Este proyecto está bajo la licencia MIT. Puedes utilizarlo, modificarlo y distribuirlo libremente.
