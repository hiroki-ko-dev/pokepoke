import React, { useState } from 'react';
import ReactDOM from 'react-dom/client';

// 画像データの型を定義
interface ImageGalleryProps {
  images: string[];
}

const ImageGallery: React.FC<ImageGalleryProps> = ({ images }) => {
  const [selectedImage, setSelectedImage] = useState<string | null>(null);
  const [isModalOpen, setModalOpen] = useState<boolean>(false);
  const [formData, setFormData] = useState({
    packId: '',
    name: '',
    reality: ''
  });

  const openModal = (image: string) => {
    setSelectedImage(image);
    setModalOpen(true);
  };

  const closeModal = () => {
    setSelectedImage(null);
    setModalOpen(false);
    setFormData({ packId: '', name: '', reality: '' }); // フォームをリセット
  };

  const handleInputChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const { name, value } = e.target;
    setFormData((prevData) => ({ ...prevData, [name]: value }));
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    // 登録処理を実装
    console.log('登録データ:', { ...formData, image: selectedImage });
    closeModal();
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
            <div className="modal-body">
              <div className="modal-image-container">
                <h2>画像編集</h2>
                <img src={selectedImage!} alt="Selected" className="modal-image" />
              </div>
              <div className="modal-form-container">
                <form onSubmit={handleSubmit}>
                  <div className="form-group">
                    <label>
                      Pack ID:
                      <input
                        type="text"
                        name="packId"
                        value={formData.packId}
                        onChange={handleInputChange}
                        className="form-control"
                      />
                    </label>
                  </div>
                  <div className="form-group">
                    <label>
                      Name:
                      <input
                        type="text"
                        name="name"
                        value={formData.name}
                        onChange={handleInputChange}
                        className="form-control"
                      />
                    </label>
                  </div>
                  <div className="form-group">
                    <label>
                      Reality:
                      <input
                        type="text"
                        name="reality"
                        value={formData.reality}
                        onChange={handleInputChange}
                        className="form-control"
                      />
                    </label>
                  </div>
                  <button type="submit" className="submit-button">登録</button>
                </form>
                <button onClick={closeModal} className="close-button">閉じる</button>
              </div>
            </div>
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
