tienda_django/
│
├── manage.py
│
├── tienda/                      ← Configuración principal del proyecto (equivalente a index.php global)
│   ├── __init__.py
│   ├── settings.py
│   ├── urls.py
│   ├── asgi.py
│   └── wsgi.py
│
├── usuarios/                    ← App para login, registro, perfil
│   ├── __init__.py
│   ├── admin.py
│   ├── apps.py
│   ├── forms.py
│   ├── models.py
│   ├── urls.py
│   ├── views.py
│   └── templates/
│       └── usuarios/
│           ├── login.html
│           ├── registro.html
│           ├── perfil.html
│           └── mis_compras.html
│
├── productos/                   ← App para productos y categorías
│   ├── __init__.py
│   ├── admin.py
│   ├── apps.py
│   ├── models.py
│   ├── urls.py
│   ├── views.py
│   └── templates/
│       └── productos/
│           ├── lista.html
│           ├── detalle.html
│           └── producto_form.html
│
├── carrito/                     ← App para carrito y pedidos
│   ├── __init__.py
│   ├── admin.py
│   ├── apps.py
│   ├── models.py
│   ├── urls.py
│   ├── views.py
│   └── templates/
│       └── carrito/
│           ├── carrito.html
│           ├── pago.html
│           ├── confirmar.html
│           └── vaciar.html
│
├── static/                      ← Archivos estáticos (CSS, JS, imágenes)
│   ├── css/
│   │   └── estilos.css
│   ├── img/
│   │   ├── logo.png
│   │   └── productos/
│   └── js/
│
└── templates/                   ← Plantillas base globales
    ├── base.html
    ├── index.html
    └── nosotros.html
