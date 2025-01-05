import React, { useState } from 'react';
import styles from './CardGallery.module.scss';

// 画像データの型を定義
interface CardGalleryProps {
  cards: string[];
  ModalComponent: React.FC<{ cardUrl: string; closeModal: () => void }>; // modalのプロパティ型を指定
  modalConditions?: Array<any>
}

const CardGallery: React.FC<CardGalleryProps> = ({ 
  cards,
  ModalComponent,
  modalConditions,
}) => {
  const [selectedCard, setSelectedCard] = useState<string | null>(null);
  const [isModalOpen, setModalOpen] = useState<boolean>(false);

  const openModal = (card: string) => {
    setSelectedCard(card);
    setModalOpen(true);
  };

  const closeModal = () => {
    setSelectedCard(null);
    setModalOpen(false);
  };

  return (
    <div className={styles.gallery}>
      <div className={styles.cardGrid}>
        {cards.map((card, index) => (
          <div
            key={index}
            className={styles.cardItem}
            onClick={() => openModal(card)}
          >
            <img src={card} alt={`card ${index}`} className={styles.card} />
          </div>
        ))}
      </div>
      {isModalOpen && (
        <ModalComponent
          cardUrl={selectedCard ?? ''}
          closeModal={closeModal}
          {...(modalConditions && { conditions: modalConditions })}
        />
      )}
    </div>
  );
};

export default CardGallery;
