<?php

namespace AppBundle\Services;

use AppBundle\Entity\Media;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class mediaInterface extends Controller
{
	protected $container;

	public function __construct(Container $container) {
		$this->container = $container;

	}

// Uploads a media
	public function mediaUpload(Media $media)
	{
		$file = $media->getFile();
		$page = $media->getPage();
		if ($media->getPath() != null) {	// Si le média contenait déjà un fichier uploadé
			$tmp = explode('/', $media->getPath());
			$filename = end($tmp);    // On récupère le nom du fichier ({{media.name}}.extension

			// On supprime ce fichier de la mémoire
            if (file_exists ($filename)){
                if ($page === "season"){
                    unlink($this->container->getParameter('medias_directory') . '/actualy/saison/' . $filename);
                    $media->setPath(null);
                }
                elseif ($page === 'exotic'){
                    unlink($this->container->getParameter('medias_directory') . '/actualy/exotic/' . $filename);
                    $media->setPath(null);
                }
                elseif ($page === 'inspiration'){
                    unlink($this->container->getParameter('medias_directory') . '/actualy/inspiration/' . $filename);
                    $media->setPath(null);
                }
                elseif ($page === 'ncreation'){
                    unlink($this->container->getParameter('medias_directory') . '/actualy/ncreation/' . $filename);
                    $media->setPath(null);
                }
                elseif ($page === 'leatherwork'){
                    unlink($this->container->getParameter('medias_directory') . '/actualy/leatherwork/' . $filename);
                    $media->setPath(null);
                }
                elseif ($page === 'pcreation'){
                    unlink($this->container->getParameter('medias_directory') . '/actualy/pcreation/' . $filename);
                    $media->setPath(null);
                }
                elseif ($page === 'tailored'){
                    unlink($this->container->getParameter('medias_directory') . '/tailored/' . $filename);
                    $media->setPath(null);
                }
                elseif ($page === 'line'){
                    unlink($this->container->getParameter('medias_directory') . '/line/' . $filename);
                    $media->setPath(null);
                }
                elseif ($page === 'chukka'){
                    unlink($this->container->getParameter('medias_directory') . '/uncollected/chukka/' . $filename);
                    $media->setPath(null);
                }
                elseif ($page === 'escarpin'){
                    unlink($this->container->getParameter('medias_directory') . '/uncollected/escarpin/' . $filename);
                    $media->setPath(null);
                }
                else {
                    unlink($this->container->getParameter('medias_directory') . '/uncollected/richelieu/' . $filename);
                    $media->setPath(null);
                }
            }

		}
		// Puis on upload le nouveau fichier
		$extension = $file->guessExtension();

        if ($page === "season"){
            $file->move($this->container->getParameter('medias_directory'), $media->getName().'.'.$extension);
            $media->setPath('assets/images/downloads/actualy/saison/'.$media->getName().'.'.$extension);
        }
        elseif ($page === 'exotic'){
            $file->move($this->container->getParameter('medias_directory'), $media->getName().'.'.$extension);
		    $media->setPath('assets/images/downloads/actualy/exotic/'.$media->getName().'.'.$extension);
        }
        elseif ($page === 'inspiration'){
            $file->move($this->container->getParameter('medias_directory'), $media->getName().'.'.$extension);
		    $media->setPath('assets/images/downloads/actualy/inspiration/'.$media->getName().'.'.$extension);
        }
        elseif ($page === 'ncreation'){
            $file->move($this->container->getParameter('medias_directory'), $media->getName().'.'.$extension);
            $media->setPath('assets/images/downloads/actualy/ncreation/'.$media->getName().'.'.$extension);
        }
        elseif ($page === 'leatherwork'){
            $file->move($this->container->getParameter('medias_directory'), $media->getName().'.'.$extension);
		$media->setPath('assets/images/downloads/actualy/leatherwork/'.$media->getName().'.'.$extension);
        }
        elseif ($page === 'pcreation'){
            $file->move($this->container->getParameter('medias_directory'), $media->getName().'.'.$extension);
            $media->setPath('assets/images/downloads/actualy/pcreation/'.$media->getName().'.'.$extension);
        }
        elseif ($page === 'tailored'){
            $file->move($this->container->getParameter('medias_directory'), $media->getName().'.'.$extension);
            $media->setPath('assets/images/downloads/tailored/'.$media->getName().'.'.$extension);
        }
        elseif ($page === 'line'){
            $file->move($this->container->getParameter('medias_directory'), $media->getName().'.'.$extension);
            $media->setPath('assets/images/downloads/line/'.$media->getName().'.'.$extension);
        }
        elseif ($page === 'chukka'){
            $file->move($this->container->getParameter('medias_directory'), $media->getName().'.'.$extension);
            $media->setPath('assets/images/downloads/uncollected/chukka/'.$media->getName().'.'.$extension);
        }
        elseif ($page === 'escarpin'){
            $file->move($this->container->getParameter('medias_directory'), $media->getName().'.'.$extension);
            $media->setPath('assets/images/downloads/uncollected/escarpin/'.$media->getName().'.'.$extension);
        }
        else {
            $file->move($this->container->getParameter('medias_directory'), $media->getName().'.'.$extension);
            $media->setPath('assets/images/downloads/uncollected/richelieu/'.$media->getName().'.'.$extension);
        }

//		$file->move($this->container->getParameter('medias_directory'), $media->getName().'.'.$extension);
//		$media->setPath('assets/images/downloads/'.$media->getName().'.'.$extension);
	}
}