# Coctel API Project

Un proyecto que consume una API pública para listar cócteles y otras bebidas alcohólicas, permitiendo realizar operaciones CRUD y escalando el frontend para una mayor modularidad de componentes.

---

## Vista Previa
<table align="center">
  <tr>
    <td align="center">
      <strong>Escritorio</strong><br>
      <img src="https://github.com/user-attachments/assets/14d88eab-c7bf-4365-9c98-70e00566c588" alt="Desktop App" width="300">
    </td>
    <td align="center">
      <strong>Móvil - Responsive</strong><br>
      <img src="https://github.com/user-attachments/assets/75759b01-e7ee-4448-9737-5a5a78236cbc" alt="Mobile App" width="300">
    </td>
  </tr>
</table>

## Tecnologías

<p align="center">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP" width="60" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg" alt="Laravel" width="60" />
  <img src="https://www.vectorlogo.zone/logos/tailwindcss/tailwindcss-icon.svg" alt="Tailwind CSS" width="60" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" alt="JavaScript" width="60" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/jquery/jquery-original.svg" alt="jQuery" width="60" />
</p>



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
