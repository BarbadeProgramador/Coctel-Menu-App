# Coctel API Project

Un proyecto que consume una API pública para listar cócteles y otras bebidas alcohólicas, permitiendo realizar operaciones CRUD y escalando el frontend para una mayor modularidad de componentes.

---

## Vista Previa

#### Escritorio
<img src="https://github.com/user-attachments/assets/14d88eab-c7bf-4365-9c98-70e00566c588" alt="Desktop App" width="300">

#### Móvil - Responsive
<img src="https://github.com/user-attachments/assets/75759b01-e7ee-4448-9737-5a5a78236cbc" alt="Mobile App" width="300">

---

## Tecnologías

<p align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" width="100">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel" width="100">
  <img src="https://img.shields.io/badge/Tailwind%20CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS" width="100">
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript" width="100">
  <img src="https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white" alt="jQuery" width="100">
</p>

---

## Sobre el Proyecto

Este proyecto utiliza el consumo de una API pública para listar cócteles y bebidas alcohólicas. Implementa distintas operaciones CRUD en el backend y se ha optimizado el frontend para lograr una estructura de componentes modular y escalable. El proyecto es ideal para aprender sobre integración de APIs, administración de datos y desarrollo responsivo con Laravel y Tailwind CSS.

---

## Idea Detrás del Proyecto

El objetivo principal es ofrecer una solución completa para gestionar menús y cartas de cócteles, brindando una interfaz amigable tanto en dispositivos de escritorio como móviles. Además, permite a los usuarios gestionar y registrar bebidas de manera dinámica, facilitando la administración de una carta de cócteles en entornos reales o de prueba.

---

## Instalación

Sigue estos pasos para extraer el proyecto, configurarlo e iniciarlo en tu entorno local.

### 1. Clonar el Repositorio

```bash
git clone https://github.com/BarbadeProgramador/Coctel-Menu-App.git
cd Coctel-Menu-App
```

### 2. Instalar Dependencias de Composer

```bash
composer install
```

### 3. Configuración del Archivo de Entorno

```bash
cp .env.example .env
```

> **Nota:** El proyecto está configurado para usar SQLite por defecto.

### 4. Generar la Clave de la Aplicación

```bash
php artisan key:generate
```

### 5. Ejecutar Migraciones

```bash
php artisan migrate
```

### 6. Instalar Dependencias de Node.js (VITE)

```bash
npm install
npm run dev
```

### 7. Iniciar el Proyecto

```bash
php artisan serve
```

Accede al proyecto en tu navegador en [http://localhost:8000](http://localhost:8000).

---

## Notas Adicionales

- **Documentación de Laravel:** [https://laravel.com/docs](https://laravel.com/docs)
- **Contribuciones:** Las contribuciones son bienvenidas.
