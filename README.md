# 🛍️ Proyecto Django - Tienda Online

Migración del proyecto PHP a Django, estructurado para mantener la funcionalidad original (login, productos, carrito de compras, y gestión de usuarios).

---

## 📁 Estructura del proyecto

tienda_django/
│
├── manage.py # Script principal para ejecutar comandos Django
│
├── tienda/ # Configuración base del proyecto
│ ├── init.py
│ ├── asgi.py
│ ├── settings.py # Configuraciones generales (apps, BD, static, templates)
│ ├── urls.py # Enrutamiento principal
│ └── wsgi.py
│
├── usuarios/ # App para login, registro y perfil de usuario
│ ├── init.py
│ ├── admin.py
│ ├── apps.py
│ ├── forms.py
│ ├── models.py # Modelo de usuario personalizado (opcional)
│ ├── urls.py # Rutas: /login, /registro, /perfil, etc.
│ ├── views.py # Controladores de las vistas
│ └── templates/
│ └── usuarios/
│ ├── login.html
│ ├── registro.html
│ ├── perfil.html
│ └── mis_compras.html
│
├── productos/ # App para gestión y visualización de productos
│ ├── init.py
│ ├── admin.py
│ ├── apps.py
│ ├── models.py # Modelo de productos, categorías, etc.
│ ├── urls.py
│ ├── views.py
│ └── templates/
│ └── productos/
│ ├── lista.html
│ ├── detalle.html
│ └── producto_form.html
│
├── carrito/ # App para carrito de compras y pedidos
│ ├── init.py
│ ├── admin.py
│ ├── apps.py
│ ├── models.py # Modelos: Carrito, ItemCarrito, Pedido
│ ├── urls.py
│ ├── views.py
│ └── templates/
│ └── carrito/
│ ├── carrito.html
│ ├── pago.html
│ ├── confirmar.html
│ └── vaciar.html
│
├── static/ # Archivos estáticos (CSS, JS, imágenes)
│ ├── css/
│ │ └── estilos.css
│ ├── js/
│ │ └── main.js
│ └── img/
│ ├── logo.png
│ └── productos/
│
└── templates/ # Plantillas globales
├── base.html # Plantilla base común
├── index.html # Página principal
└── nosotros.html # Página informativa

yaml
Copiar código

---

## ⚙️ Instalación y configuración

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/tuusuario/tienda_django.git
   cd tienda_django
Crear entorno virtual

bash
Copiar código
python -m venv venv
venv\Scripts\activate   # En Windows
# source venv/bin/activate   # En Linux/Mac
Instalar dependencias

bash
Copiar código
pip install -r requirements.txt
Aplicar migraciones

bash
Copiar código
python manage.py migrate
Iniciar el servidor

bash
Copiar código
python manage.py runserver
Abrir en el navegador
👉 http://127.0.0.1:8000

🧱 Estructura de apps
App	Descripción
usuarios	Manejo de autenticación, registro y perfil de usuario
productos	Catálogo de productos, búsqueda y detalle
carrito	Lógica de carrito, pedidos y pagos

🧰 Tecnologías utilizadas
Python 3.12+

Django 5.x

SQLite / MySQL

HTML5, CSS3, Bootstrap

JavaScript (opcional para interacción dinámica)

📌 Próximos pasos
Migrar base de datos de MySQL (PHP) a Django ORM

Implementar autenticación Django (django.contrib.auth)

Crear modelos equivalentes a las tablas del sistema PHP (productos, usuarios, compras, etc.)

Mejorar vistas y plantillas con Django Templates

