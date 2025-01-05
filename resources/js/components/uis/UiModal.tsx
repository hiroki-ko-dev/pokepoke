import React from 'react';
import styles from './UiModal.module.scss';

// 画像データの型を定義
interface UiModalProps {
  onClose: () => void;
  children: React.ReactNode;
}

const UiModal: React.FC<UiModalProps> = ({ 
  onClose,
  children,
}) => {
  return (
    <div className={styles.modal}>
      <div className={styles.modalPanel}>
        <div onClick={onClose} className={styles.closeButton} aria-label="閉じる">
          ×
        </div>
        {children}
      </div>
    </div>
  );
};

export default UiModal;
