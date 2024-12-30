import React, { useState } from 'react';
import ReactDOM from 'react-dom/client';

// 画像データの型を定義
interface ImageGalleryProps {
  images: string[];
}

const ImageGallery: React.FC<ImageGalleryProps> = ({ images }) => {
  // 状態の型を指定
  const [selectedImage, setSelectedImage] = useState<string | null>(null);
  const [isModalOpen, setModalOpen] = useState<boolean>(false);

  // モーダルを開く関数
  const openModal = (image: string) => {
    setSelectedImage(image);
    setModalOpen(true);
  };

  // モーダルを閉じる関数
  const closeModal = () => {
    setSelectedImage(null);
    setModalOpen(false);
  };

  return (
    <div className="gallery">
      {/* 画像一覧 */}
      <div className="image-grid">
        {images.map((image, index) => (
          <div key={index} className="image-item" onClick={() => openModal(image)}>
            <img src={image} alt={`Image ${index}`} className="image" />
          </div>
        ))}
      </div>

      {/* 編集モーダル */}
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

// サーバーから画像データを取得
const images: string[] = [
  '/assets/images/cards/A1/charizard/A1-011-226.png',
  '/assets/images/cards/A1/charizard/A1-012-226.png',
  '/assets/images/cards/A1/charizard/A1-011-226.png',
  '/assets/images/cards/A1/charizard/A1-011-226.png',
  '/assets/images/cards/A1/charizard/A1-011-226.png',
  '/assets/images/cards/A1/charizard/A1-011-226.png',
  '/assets/images/cards/A1/charizard/A1-011-226.png',
  '/assets/images/cards/A1/charizard/A1-011-226.png',
  '/assets/images/cards/A1/charizard/A1-011-226.png',
  '/assets/images/cards/A1/charizard/A1-011-226.png',
  // 他の画像URLを追加
];

// Reactアプリケーションの描画
const root = ReactDOM.createRoot(document.getElementById('react-root') as HTMLElement);
root.render(<ImageGallery images={images} />);
