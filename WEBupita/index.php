<?php
// index.php - Página principal del sitio UPIITA
// Este archivo debe estar en la raíz del servidor

// Cargar configuración
require_once 'config.php';

// Cargar header
require_once INCLUDES_PATH . 'header.php';
?>

<!-- Imagen destacada de la escuela -->
<section class="hero-image">
    <img src="<?= url('images/UpitaPortada.jpg') ?>" alt="UPIITA" class="hero-img" style="width: 100%; height: auto;">
</section>

<!-- Sección de bienvenida -->
<section class="welcome-section" style="padding: 40px 20px; text-align: center; background-color: #f8f9fa;">
    <div class="container" style="max-width: 1200px; margin: 0 auto;">
        <h2 style="color: #003366; margin-bottom: 20px;">Bienvenido a UPIITA</h2>
        <p style="font-size: 18px; color: #666; line-height: 1.6; margin-bottom: 30px;">
            La Unidad Profesional Interdisciplinaria en Ingeniería y Tecnologías Avanzadas del IPN 
            te ofrece una formación integral en las áreas más innovadoras de la ingeniería.
        </p>
        
        <div class="features" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 40px;">
            <!-- Navegación Inteligente -->
            <div class="feature-card" style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                <i class="fas fa-map-marked-alt" style="font-size: 48px; color: #007bff; margin-bottom: 20px; display: block;"></i>
                <h3 style="color: #333; margin-bottom: 15px;">Navegación Inteligente</h3>
                <p style="color: #666; margin-bottom: 20px;">Encuentra fácilmente cualquier aula o laboratorio con nuestro sistema de mapas interactivos.</p>
                <a href="<?= url('pages/mapa-interactivo.php') ?>" class="btn" style="display: inline-block; margin-top: 15px; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; transition: background 0.3s ease;">
                    <i class="fas fa-map"></i> Explorar Mapa
                </a>
            </div>
            
            <!-- Oferta Educativa -->
            <div class="feature-card" style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                <i class="fas fa-graduation-cap" style="font-size: 48px; color: #28a745; margin-bottom: 20px; display: block;"></i>
                <h3 style="color: #333; margin-bottom: 15px;">Oferta Educativa</h3>
                <p style="color: #666; margin-bottom: 20px;">Conoce nuestros programas de ingeniería en Biónica, Mecatrónica y Telemática.</p>
                <a href="<?= url('pages/oferta-educativa.php') ?>" class="btn" style="display: inline-block; margin-top: 15px; padding: 10px 20px; background: #28a745; color: white; text-decoration: none; border-radius: 5px; transition: background 0.3s ease;">
                    <i class="fas fa-book"></i> Ver Programas
                </a>
            </div>
            
            <!-- Comunidad UPIITA -->
            <div class="feature-card" style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                <i class="fas fa-users" style="font-size: 48px; color: #ffc107; margin-bottom: 20px; display: block;"></i>
                <h3 style="color: #333; margin-bottom: 15px;">Comunidad UPIITA</h3>
                <p style="color: #666; margin-bottom: 20px;">Forma parte de nuestra vibrante comunidad estudiantil y académica.</p>
                <a href="<?= url('pages/comunidad.php') ?>" class="btn" style="display: inline-block; margin-top: 15px; padding: 10px 20px; background: #ffc107; color: #333; text-decoration: none; border-radius: 5px; transition: background 0.3s ease;">
                    <i class="fas fa-hand-holding-heart"></i> Únete
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Sección de acceso rápido -->
<section class="quick-access" style="padding: 40px 20px; background-color: #e9ecef;">
    <div class="container" style="max-width: 1200px; margin: 0 auto;">
        <h2 style="text-align: center; color: #003366; margin-bottom: 30px;">Acceso Rápido</h2>
        
        <div class="quick-links" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <!-- Enlaces para usuarios autenticados -->
                <a href="<?= url('pages/mapa-rutas.php') ?>" class="quick-link" style="background: #17a2b8; color: white; padding: 20px; text-align: center; text-decoration: none; border-radius: 8px; transition: all 0.3s ease;">
                    <i class="fas fa-route" style="font-size: 24px; margin-bottom: 10px; display: block;"></i>
                    <span>Calcular Ruta</span>
                </a>
                
                <a href="<?= url('Public/favoritos.php') ?>" class="quick-link" style="background: #6c757d; color: white; padding: 20px; text-align: center; text-decoration: none; border-radius: 8px; transition: all 0.3s ease;">
                    <i class="fas fa-star" style="font-size: 24px; margin-bottom: 10px; display: block;"></i>
                    <span>Mis Favoritos</span>
                </a>
                
                <a href="<?= url('Public/perfil.php') ?>" class="quick-link" style="background: #343a40; color: white; padding: 20px; text-align: center; text-decoration: none; border-radius: 8px; transition: all 0.3s ease;">
                    <i class="fas fa-user-circle" style="font-size: 24px; margin-bottom: 10px; display: block;"></i>
                    <span>Mi Perfil</span>
                </a>
            <?php else: ?>
                <!-- Enlaces para visitantes -->
                <a href="<?= url('Public/login.php') ?>" class="quick-link" style="background: #007bff; color: white; padding: 20px; text-align: center; text-decoration: none; border-radius: 8px; transition: all 0.3s ease;">
                    <i class="fas fa-sign-in-alt" style="font-size: 24px; margin-bottom: 10px; display: block;"></i>
                    <span>Iniciar Sesión</span>
                </a>
                
                <a href="<?= url('Public/registro.php') ?>" class="quick-link" style="background: #28a745; color: white; padding: 20px; text-align: center; text-decoration: none; border-radius: 8px; transition: all 0.3s ease;">
                    <i class="fas fa-user-plus" style="font-size: 24px; margin-bottom: 10px; display: block;"></i>
                    <span>Registrarse</span>
                </a>
            <?php endif; ?>
            
            <a href="<?= url('pages/red-genero.php') ?>" class="quick-link" style="background: #e83e8c; color: white; padding: 20px; text-align: center; text-decoration: none; border-radius: 8px; transition: all 0.3s ease;">
                <i class="fas fa-venus-mars" style="font-size: 24px; margin-bottom: 10px; display: block;"></i>
                <span>Red de Género</span>
            </a>
            
            <a href="<?= url('pages/redes-sociales.php') ?>" class="quick-link" style="background: #6f42c1; color: white; padding: 20px; text-align: center; text-decoration: none; border-radius: 8px; transition: all 0.3s ease;">
                <i class="fas fa-share-alt" style="font-size: 24px; margin-bottom: 10px; display: block;"></i>
                <span>Redes Sociales</span>
            </a>
        </div>
    </div>
</section>

<!-- Estilos adicionales -->
<style>
    .feature-card:hover {
        transform: translateY(-5px);
    }
    
    .btn:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }
    
    .quick-link:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    }
    
    @media (max-width: 768px) {
        .features {
            grid-template-columns: 1fr !important;
        }
        
        .quick-links {
            grid-template-columns: repeat(2, 1fr) !important;
        }
    }
</style>

<?php
// Cargar footer
require_once INCLUDES_PATH . 'footer.php';
?>