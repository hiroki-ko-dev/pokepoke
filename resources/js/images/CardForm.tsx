import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom/client';

// 画像データの型を定義
interface ImageGalleryProps {
  images: string[];
}

const ImageGallery: React.FC<ImageGalleryProps> = ({ images }) => {
  const [selectedImage, setSelectedImage] = useState<string | null>(null);
  const [isModalOpen, setModalOpen] = useState<boolean>(false);

  const openModal = (image: string) => {
    setSelectedImage(image);
    setModalOpen(true);
  };

  const closeModal = () => {
    setSelectedImage(null);
    setModalOpen(false);
  };

  return (
    <div className="gallery">
      <div className="image-grid">
        {images.map((image, index) => (
          <div key={index} className="image-item" onClick={() => openModal(image)}>
            <img src={image} alt={`Image ${index}`} className="image" />
          </div>
        ))}
      </div>

      {isModalOpen && (
        <div className="modal">
          <div className="modal-content">
            <h2>画像編集</h2>
            <img src={selectedImage!} alt="Selected" className="modal-image" />
            <button onClick={closeModal} className="close-button">閉じる</button>
          </div>
        </div>
      )}
    </div>
  );
};

// Laravel から渡された画像データを取得
const images = (window as any).images || [];

// Reactアプリケーションの描画
const root = ReactDOM.createRoot(document.getElementById('react-root') as HTMLElement);
root.render(<ImageGallery images={images} />);
